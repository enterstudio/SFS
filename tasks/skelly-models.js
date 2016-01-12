/*eslint-disable */
'use strict';

var path = require('path');
var fs = require('fs');
var requireUncached = require('require-uncached');

module.exports = function models (modelsDir) {
    var modelsPath = modelsDir;
    return function (file) {
        var data;
        var globalData;
        var dataPath = path.join(process.cwd(), modelsPath, path.basename(file.path, '.html') + '.json');
        var globalDataPath = path.join(process.cwd(), modelsPath, '_global.json');

        try {
            data = requireUncached(dataPath);
        } catch (e) { data = false; }

        try {
            globalData = requireUncached(globalDataPath);
        } catch (e) { globalData = false; }

        return {
            global: globalData,
            model: data
        };
    }
}
module.exports.ModelTag = function parseModel (modelDir) {
    this.modelDir = modelDir;
    this.tags = ['model'];
    this.parse = function(parser, nodes, lexer) {
        var tok = parser.nextToken();
        var args = parser.parseSignature(null, true);
        parser.advanceAfterBlockEnd(tok.value);
        return new nodes.CallExtension(this, 'run', args);
    };
    this.run = function(context, model, args) {
        model = (model.indexOf('.json') > -1) ? model : model + '.json';
        if (args && 'as' in args) {
            context['ctx'][args.as] = JSON.parse(fs.readFileSync(path.join(this.modelDir, model)));
        } else {
            if (typeof context['ctx']['models'] === 'undefined') {
                context['ctx']['models'] = {};
            }
            context['ctx']['models'][model] = JSON.parse(fs.readFileSync(path.join(this.modelDir, model)));
        }
    };
}
