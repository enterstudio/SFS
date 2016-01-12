/*eslint-disable */
'use strict';

var path = require('path');
var gulp = require('gulp');

var requireUncached = require('require-uncached');
var harp = require('harp');
var bs = require('browser-sync').create();
var emptyPort = require('empty-port');

module.exports = function harpSync (opts) {
    var options = opts;
    return function () {
        emptyPort({}, function (err, port) {
            harp.server(options.outputDir, {
                port: port
            }, function () {
                bs.init({
                    open: false,
                    notify: false,
                    proxy: 'localhost:' + port,
                    port: options.port,
                    ui: options.browserSyncUI,
                    files: options.reloadExts.map(function (ext) {
                        return path.join(options.outputDir, '**', '*'+ext);
                    })
                });
            });
        });
    }
};
module.exports.browserSync = bs;
module.exports.harp = harp;
