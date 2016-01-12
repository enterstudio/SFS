/*eslint-disable */
'use strict';

var gulp = require('gulp');
var shell = require('gulp-shell');
var rssi = require('rssi');
var surgeCmd = rssi('surge -p #{dir} -d #{url}');

module.exports = function (options) {
    var opts = options;

    return shell.task([
        'echo "[$(date +\'%T\')]" Publishing to ' + opts.domain,
        surgeCmd({
            dir: opts.outputDir,
            url: opts.domain
        }),
    ]);
};
