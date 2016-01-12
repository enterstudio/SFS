/*eslint-disable */
'use strict';

var gulp = require('gulp');
var cached = require('gulp-cached');
var _ = require('lodash');

module.exports = function copyStatic (options) {
    var opts = options;
    var ignoredSrc = _.flattenDeep([
        './**/*',
        opts.ignore.map(function (glob) {
            if (_.endsWith(glob, '/')) {
                return [
                    '!./' + glob.replace('/',''),
                    '!./' + glob + '**'
                ];
            }
            return '!./' + glob;
        }).concat(opts.unignore)
    ]);
    return function () {
        return gulp.src(ignoredSrc)
            .pipe(cached('static'))
            .pipe(gulp.dest(opts.outputDir));
    }
};
module.exports.copyOne = function (options) {
    var opts = options;
    return function (e) {
        return gulp.src(e.path, {
                base: process.cwd()
            })
            .pipe(cached('static'))
            .pipe(gulp.dest(opts.outputDir));
    }
};
