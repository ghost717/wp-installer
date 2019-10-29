const { src, dest, watch, series, parallel } = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const browserSync = require("browser-sync").create();
var replace = require('gulp-replace');

const files = { 
    // scssPath: 'src/css/**/*.scss',
    scssPath: 'src/css/*.scss',
    jsLibPath: 'src/js/lib/*.js',
    jsPath: 'src/js/*.js'
}

function reload(done) {
    browserSync.reload();
    done();
}

function scssTask(){    
    return src(files.scssPath)
        .pipe(sourcemaps.init()) // initialize sourcemaps first
        .pipe(concat('app.css'))
        .pipe(sass()) // compile SCSS to CSS
        .pipe(postcss([ autoprefixer(), cssnano() ])) // PostCSS plugins
        // .pipe(sourcemaps.write('.')) // write sourcemaps file in current directory
        .pipe(dest('dist/css'))
        .pipe(browserSync.stream());
}

function jsTask(){
    return src([
        files.jsLibPath, files.jsPath
        //,'!' + 'includes/js/jquery.min.js', // to exclude any specific files
        ])
        .pipe(concat('app.js'))
        .pipe(uglify())
        .pipe(dest('dist/js')
    );
}

// Cachebust
var cbString = new Date().getTime();
function cacheBustTask(){
    return src(['index.html'])
        .pipe(replace(/cb=\d+/g, 'cb=' + cbString))
        .pipe(dest('.'));
}

function watchs() {
    browserSync.init({
        // proxy: 'http://localhost/dev/other-project_zad_rekrutacyjne/stamed/', // Change this value to match your local URL.
        proxy: 'http://localhost/',
        socket: {
          domain: 'localhost:3000'
        }
    });

    watch([files.scssPath, files.jsPath], parallel(scssTask, jsTask)).on('change', browserSync.reload);
    watch("*.php").on("change", browserSync.reload);
}
 
exports.default = series(
    parallel(scssTask, jsTask), 
    // cacheBustTask,
    watchs
);