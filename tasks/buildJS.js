/*eslint-disable */
'use strict';

var gulp = require('gulp');
var gutil = require('gulp-util');
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');
var babelify = require('babelify');

var watchify = require('watchify');
var browserify = require('browserify');
var source = require('vinyl-source-stream');
var buffer = require('vinyl-buffer');
var _ = require('lodash');

module.exports = function buildJS (options, file) {
    var opts = options;

    var browserifyOpts = _.assign({}, watchify.args, opts.browserify, { entries: [file] });
    var b = (opts._.watchify) ? watchify(browserify(browserifyOpts)) : browserify(browserifyOpts);

    b.on('log', gutil.log);
    if (opts.babel) {
        b.transform(babelify);
    }

    var bundle = function bundle () {
        return b.bundle()
            .on('error', gutil.log.bind(gutil, 'Browserify Error'))
            .pipe(source(path.basename(file, '.js') + '.bundle.js'))
            .pipe(buffer())
            .pipe(sourcemaps.init({loadMaps: true}))
            .pipe(uglify())
            .pipe(sourcemaps.write('./'))
            .pipe(gulp.dest(path.join(opts.outputDir, opts.scriptDir)));
    }
    b.on('update', bundle);

    return bundle;
};
