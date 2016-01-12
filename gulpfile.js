/*eslint-disable */
var pkg = require('./package.json');
console.log(
'\n',
'      ▄▄▄  ▄██▄    \n',
'     ▐▀█▀▌    ▀█▄  \n',
'     ▐█▄█▌      ▀█▄\n',
'      ▀▄▀   ▄▄▄▄▄▀▀\n',
'    ▄▄▄██▀▀▀▀      \n',
'   █▀▄▄▄█ ▀▀         ███████╗██╗  ██╗███████╗██╗     ██╗  ██╗   ██╗\n',
'   ▌ ▄▄▄▐▌▀▀▀        ██╔════╝██║ ██╔╝██╔════╝██║     ██║  ╚██╗ ██╔╝\n',
'▄ ▐   ▄▄ █ ▀▀        ███████╗█████╔╝ █████╗  ██║     ██║   ╚████╔╝ \n',
'▀█▌   ▄ ▀█▀ ▀        ╚════██║██╔═██╗ ██╔══╝  ██║     ██║    ╚██╔╝  \n',
'       ▄▄▐▌▄▄        ███████║██║  ██╗███████╗███████╗███████╗██║   \n',
'       ▀███▀█ ▄      ╚══════╝╚═╝  ╚═╝╚══════╝╚══════╝╚══════╝╚═╝   \n',
'      ▐▌▀▄▀▄▀▐▄      '+pkg.description+' / v'+pkg.version+' / fffunction.co\n',
'      ▐▀      ▐▌   \n',
'      █        █   \n',
'     ▐▌         █  \n'
);
function strepeat (num, str) {
    return new Array( num + 1 ).join( str );
}
function loading (dots) {
    if ('moveCursor' in process.stdout && 'clearLine' in process.stdout) {
        if (dots) {
            process.stdout.moveCursor(0, -1);
            process.stdout.clearLine();
        }
        util.log(util.colors.green('Starting' + strepeat(dots, '.')));
    }
}
var util = require('gulp-util');
loading(0);
var path = require('path');
loading(1);
var gulp = require('gulp');
loading(2);
var requireDir = require('require-dir');
loading(3);
var tasks = requireDir('./tasks');
loading(4);
var rc = require('rc');
loading(5);
var osenv = require('osenv');
loading(6);
var _ = require('lodash');
loading(7);
var del = require('del');
loading(8);
var fs = require('fs');
loading(9);
var glob = require('glob');
loading(10);
var plumber = require('gulp-plumber');
loading(11);

// Override gulp.src to handle errors in streams nicely
// This should stop errors from crashing gulp
var gulp_src = gulp.src;
gulp.src = function() {
  return gulp_src.apply(gulp, arguments)
    .pipe(plumber(function(error) {
      // Output an error message
      util.log(util.colors.red('Error (' + error.plugin + '): ' + error.message));
      // emit the end event, to properly end the task
      this.emit('end');
    })
  );
};

var defaults = {
    // Templating
    templateDir: 'templates',
    moreTemplates: ['layouts', 'includes'],
    outputDir: 'static',
    modelsDir: 'models',
    collectionsDir: 'collections',
    // Preprocessing
    scriptDir: 'assets/js',
    browserify: {
        debug: true
    },
    babel: true,
    libDir: 'assets/js/libs',
    sassDir: 'assets/css',
    imgDir: 'assets',
    imageExts: ['.svg', '.jpg', '.jpeg', '.png', '.gif'],
    imagemin: {
        progressive: true,
        interlaced: true
    },
    // Static
    // .files are automatically ignored
    // so you need to unignore them next
    ignore: [
        'README.md',
        'gulpfile.js',
        'package.json',
        'assets/',
        'tasks/',
        'templates/',
        'layouts/',
        'includes/',
        'static/',
        'models/',
        'collections/',
        'node_modules/',
        'bower_components/',
        'content/',
        'kirby/',
        'panel/',
        'site/',
        'thumbs/',
        'index.php',
        'license.md',
        'readme.md',
        '.htaccess'
    ],
    unignore: [
        '.htaccess'
    ],
    // Serving
    port: 3000,
    browserSyncUI: {
        port: 3001,
        weinre: {
            port: 9090
        }
    },
    reloadExts: [
        '.html',
        '.css',
        '.js',
        '.svg',
        '.jpg',
        '.jpeg',
        '.png',
        '.gif',
    ],
    // Publishing
    domain: ''
};
var opts = rc('skelly', _.extend({}, defaults));


// if serve, build to tmpdir, else build to outputDir
if (opts._.indexOf('serve') > -1 || opts._.indexOf('deploy') > -1) {
    var tmpPath = osenv.tmpdir();
    try {
        // This tries to resolve the tmpdir to a real path
        // since it's in a symlinked path (at least on OSX)
        var realPath = path.resolve(tmpPath);
        realPath = fs.realpathSync(realPath);
        tmpPath = realPath;
    } catch (e) {}
    opts.outputDir = path.join(tmpPath, 'skelly', path.basename(process.cwd()));
}
if (opts._.indexOf('build') > -1 || opts._.indexOf('deploy') > -1) {
    opts._.watchify = false;
} else {
    opts._.watchify = true;
}
if (opts._.indexOf('deploy') > -1 && !opts.domain) {
    util.log(util.colors.red('You must supply a domain to deploy to.'));
    util.log(util.colors.red('Try the --domain option or add it to a .skellyrc file.'));
    process.exit(0);
}


gulp.task('buildHTML', tasks.buildHTML(opts));
gulp.task('watchHTML', ['buildHTML'], function () {
    var templateWatchGlobs = _.flattenDeep([
            [opts.templateDir],
            [opts.moreTemplates],
            [opts.modelsDir],
            [opts.collectionsDir]
        ]).map(function (dir) {
            return path.join(dir, '**', '*');
        });
    gulp.watch(templateWatchGlobs, ['buildHTML']);
});

// Generate a gulp task to watchify/browserify each js entry file in assets/js
glob.sync(path.join(opts.scriptDir, '*.js')).forEach(function (file) {
    gulp.task('build ' + path.basename(file), tasks.buildJS(opts, file));
});
gulp.task('buildJS', Object.keys(gulp.tasks).filter(function (taskName) {
    return (taskName.indexOf('build ') > -1);
}));
gulp.task('copyLibs', tasks.copyJS(opts));
gulp.task('watchJS', ['buildJS', 'copyLibs'],  function () {
    gulp.watch(path.join(opts.scriptDir, '**', '*'), ['copyLibs']);
});

gulp.task('buildCSS', tasks.buildCSS(opts));
gulp.task('watchCSS', ['buildCSS'], function () {
    gulp.watch(path.join(opts.sassDir, '**', '*.scss'), ['buildCSS']);
});

gulp.task('optimiseImages', tasks.images(opts));
gulp.task('watchImages', ['optimiseImages'], function () {
    var watchPaths = path.join(opts.imgDir, '**', '*' + '{' + opts.imageExts.join(',') + '}');
    gulp.watch(watchPaths, ['optimiseImages']);
});

gulp.task('copyStatic', ['buildHTML', 'buildJS', 'copyLibs', 'buildCSS', 'optimiseImages'], tasks.copyStatic(opts));
gulp.task('watchStatic', ['copyStatic'], function () {
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
    gulp.watch(ignoredSrc, tasks.copyStatic.copyOne(opts));
});

gulp.task('emptyTarget', function () {
    return del.sync(path.join(opts.outputDir, '**', '*'), {
        force: true
    });
});

gulp.task('harpSync', ['buildHTML', 'buildJS', 'buildCSS', 'optimiseImages', 'copyStatic'], tasks.harpSync(opts));

gulp.task('default', ['serve']);
gulp.task('serve', ['emptyTarget', 'watchHTML', 'watchJS', 'watchCSS', 'watchImages', 'watchStatic', 'harpSync']);
gulp.task('build', ['emptyTarget', 'copyStatic']);
gulp.task('deploy', ['build'], tasks.deploy(opts));
gulp.task('help', function () {
    var s4 = '    ';
    delete defaults._;
    console.log('');
    console.log(util.colors.underline('Commands:'));
    console.log(s4 + 'gulp serve');
    console.log(s4 + 'gulp build');
    console.log(s4 + 'gulp deploy');
    console.log(s4 + 'gulp help');
    console.log('');
    console.log(util.colors.underline('Default options:'));
    console.log(JSON.stringify(defaults, null, 4));
});
