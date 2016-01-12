/*eslint-disable */
'use stict';

var path = require('path');
var gulp = require('gulp');
var cached = require('gulp-cached');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

module.exports = function buildCSS (options) {
    var opts = options;
    var jsGlob = path.join(opts.libDir, '**', '*.js');
    return function () {
        return gulp.src(jsGlob, {
                base: '.'
            })
            .pipe(cached('js'))
            .pipe(gulp.dest(opts.outputDir))
            .pipe(uglify())
            .pipe(rename({
                extname: '.min.js'
            }))
            .pipe(gulp.dest(opts.outputDir));
    }
};
