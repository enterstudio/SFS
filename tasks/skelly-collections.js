/*eslint-disable */
'use strict';

var fs = require('fs');
var fm = require('fastmatter');
var path = require('path');
var through = require('through2');
var gutil = require('gulp-util');
var nunjucks = require('nunjucks');
var _ = require('lodash');

function getCollections () {
    this.tags = ['collection'];
    this.parse = function(parser, nodes, lexer) {
        var tok = parser.nextToken();
        var args = parser.parseSignature(null, true);
        parser.advanceAfterBlockEnd(tok.value);
        parser.parseUntilBlocks('endcollection');
        parser.advanceAfterBlockEnd();
        return new nodes.CallExtension(this, 'run', args);
    };
    this.run = function(context, collection, args, other) {
        return new nunjucks.runtime.SafeString('//skelly-collections//{"name":"'+collection+'","args":'+JSON.stringify(args)+'}//skelly-collections//');
    };
}

module.exports = function collections (opts) {
    var collectionsDir = opts.collectionsDir;
    var nunj = new nunjucks.Environment(new nunjucks.FileSystemLoader(opts.searchPaths, true));
    opts.setUp(nunj);

    var tapStream;

    var collect = function () {

        tapStream = through.obj();

        var stream = through.obj(function (file, enc, cb) {
            if (!collectionsDir) {
                cb(new gutil.PluginError('skelly-collections', 'You must supply a collections directory'));
                return;
            }
            if (file.isNull()) {
                cb(null, file);
                return;
            }
            if (file.isStream()) {
                cb(new gutil.PluginError('skelly-collections', 'Streaming not supported'));
                return;
            }

            var contents = file.contents.toString();
            try {
                var tpl = nunj.renderString(contents);
            } catch (e) {
                cb(e);
                return;
            }
            var collections = tpl.match(new RegExp('//skelly-collections//(.*)//skelly-collections//', 'g'));
            if (!collections) {
                cb(null, file);
                return;
            }

            collections = collections.map(function (str) {
                return JSON.parse(str.replace(new RegExp('//skelly-collections//', 'g'), ''));
            });

            collections.forEach(function (collection) {
                var files;
                var perPage;
                var numPages;
                try {
                    files = fs.readdirSync(path.join(collectionsDir, collection.name));
                } catch (e) {
                    files = [];
                }

                perPage = collection.args.per_page;
                numPages = Math.ceil(files.length / perPage);

                // i > 1 because 1 will be the page we're looking at
                for (var i = numPages; i > 1; i--) {
                    var contents = file.contents.toString();
                    contents = contents.replace(/({%\s*collection[^%]*)(%})/m, '$1, offset=' + String(perPage * (i-1)) + ' $2')
                    tapStream.push(new gutil.File({
                        cwd: '',
                        base: file.base,
                        path: (file.path.indexOf('index.html') > -1) ?
                            file.path.replace('index.html', i+'.html') :
                            file.path.replace('.html', '/' + i + '.html'),
                        contents: new Buffer(contents)
                    }));
                };

            });

            file.path = (file.path.indexOf(collections[0].name + '.html') > -1) ?
                             file.path.replace('.html', '/index.html') :
                             file.path;
            cb(null, file);

        });

        return stream;

    }

    collect.merge = function() {
        return tapStream;
    };

    return collect;

};

module.exports.CollectionTag = function parseCollections (collectionsDir) {
    this.collectionsDir = collectionsDir;
    this.tags = ['collection'];
    this.parse = function(parser, nodes, lexer) {
        var tok = parser.nextToken();
        var args = parser.parseSignature(null, true);
        parser.advanceAfterBlockEnd(tok.value);
        var body = parser.parseUntilBlocks('endcollection');
        parser.advanceAfterBlockEnd();
        return new nodes.CallExtension(this, 'run', args, [body]);
    };
    this.run = function(context, collection, args, body) {
        var collectionsDir = this.collectionsDir;

        context.ctx.collection = {};

        var files;
        try {
            files = fs.readdirSync(path.join(collectionsDir, collection));
        } catch (e) {
            files = [];
        }
        var perPage = args.per_page;
        var offset = args.offset || 0;
        var numPages = Math.ceil(files.length / perPage);

        files = files.map(function (filename) {
            var file = fs.readFileSync(path.join(collectionsDir, collection, filename));
            var data = fm(file.toString());
            var content = {
                content: file,
                url: path.join('/', collection, path.basename(filename, path.extname(filename))).toLowerCase()
            };
            return _.extend(data.attributes, content);
        });

        context.ctx.collection.items = files.slice(offset, (offset + perPage >= files.length) ? files.length : perPage);
        var prev = offset/perPage;
        var next = prev + 2;
        prev = (prev === 1) ? 'index' : prev;
        context.ctx.pagination = {
            prev: (prev < 1) ? undefined : path.join('/', collection, prev + '.html'),
            next: (next > numPages) ? undefined : path.join('/', collection, next + '.html'),
            pages: Array.apply(null, Array(numPages)).map(function (v, i) {
                i += 1;
                return path.join('/', collection, ((i === 1) ? 'index' : i)+'.html');
            }),
            last: (offset/perPage + 1 === numPages) ? undefined : path.join('/', collection, numPages + '.html'),
        };

        return new nunjucks.runtime.SafeString(body());
    };
}
