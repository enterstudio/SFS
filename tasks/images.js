/*eslint-disable */
'use strict';

var path = require('path');
var gulp = require('gulp');
var imgmin = require('gulp-imagemin');
var cached = require('gulp-cached');

module.exports = function images (options) {
    var opts = options;
    var srcPaths = path.join(opts.imgDir, '**', '*' + '{' + opts.imageExts.join(',') + '}');
    return function () {
        return gulp.src(srcPaths, {
                base: '.'
            })
            .pipe(cached('images', {
                optimizeMemory: true
            }))
            // .pipe(imgmin(opts.imagemin))
            .pipe(gulp.dest(path.join(opts.outputDir)));
    };
}
