/*eslint-disable */
'use strict';

var path = require('path');
var gulp = require('gulp');
var data = require('gulp-data');
var nunjucks = require('gulp-nunjucks-html');
var cached = require('gulp-cached');
var _ = require('lodash');

var NunjucksCapture = require('nunjucks-capture');
var skellycollections = require('./skelly-collections.js');
var skellymodels = require('./skelly-models.js');

module.exports = function buildHTML (opts) {
    var modelsDir = opts.modelsDir;
    var collectionsDir = opts.collectionsDir;
    var outputDir = opts.outputDir;
    var templateDir = opts.templateDir;
    var templateDirs = _.flattenDeep([ [opts.templateDir], [opts.moreTemplates] ]);

    function setUp (env) {
        env.addExtension('Capture', new NunjucksCapture());
        env.addExtension('Collections', new skellycollections.CollectionTag(collectionsDir));
        env.addExtension('Models', new skellymodels.ModelTag(modelsDir));
        return env;
    }

    var collections = skellycollections({
        searchPaths: templateDirs,
        collectionsDir: collectionsDir,
        setUp: setUp
    });

    return function () {
        return gulp.src([
                path.join(templateDir, '**', '*.html'),
                path.join(collectionsDir, '**', '*')
            ])
            .pipe(collections())
            .pipe(collections.merge())
            .pipe(data(skellymodels(modelsDir)))
            .pipe(nunjucks({
                searchPaths: templateDirs,
                setUp: setUp
            }))
            .pipe(cached('templates', {
                optimizeMemory: true
            }))
            .pipe(gulp.dest(outputDir));
    }
};
