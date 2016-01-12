/*eslint-disable */
'use stict';

var path = require('path');
var gulp = require('gulp');
var util = require('gulp-util');
var cached = require('gulp-cached');
var sass = require('gulp-sass');
var globbing = require('node-sass-globbing');
var rename = require('gulp-rename');
var postcss = require('gulp-postcss');
var autoprefix = require('autoprefixer');
//var mqpacker = require('css-mqpacker');
var minify = require('gulp-minify-css');

module.exports = function buildCSS (options) {
    var opts = options;
    var sassGlob = path.join(opts.sassDir, '**', '[^_]*.scss');
    var processors = [
        autoprefix,
        // mqpacker
    ];
    return function () {
        return gulp.src(sassGlob, {
                base: '.'
            })
 //           .pipe(cached('sass'))
            .pipe(sass({
                precision: 10,
                file: true,
                importer: globbing
            }))
            .pipe(postcss(processors))
            .pipe(gulp.dest(opts.outputDir))
            .pipe(minify())
            .pipe(rename({
                extname: '.min.css'
            }))
            .pipe(gulp.dest(opts.outputDir));
    }
};
