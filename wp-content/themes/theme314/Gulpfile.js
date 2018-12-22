var gulp = require('gulp');
var cssnano = require('gulp-cssnano');
var concat = require("gulp-concat");
var uglify = require("gulp-uglify");
var autoprefixer = require('gulp-autoprefixer');
var imagemin = require('gulp-imagemin');
var imageminMozjpeg = require('imagemin-mozjpeg');
var sass = require("gulp-sass");
var gutil = require("gulp-util");
var del = require("del");
var babel = require('gulp-babel');



var dir = {
	css: 'src/css/*',
	csslib: 'src/css/lib/',
	js: 'src/js/*.js',
	jslib: 'src/js/lib/',
	php: '*.php',
	img: 'src/img/**',
	build: 'dist/',
	buildCss: 'dist/css/',
	buildJs: 'dist/js/',
	buildImg: 'dist/img/'
};


// import the libraries here
// merged into dist/js/lib.js
var jsLib = [
	dir.jslib + 'jq.js',
	dir.jslib + 'owl.js',
	dir.jslib + 'acf-map.js',
	dir.jslib + 'jquery.lightbox.js',
	dir.jslib + 'aos.js',
];

// merged into dist/css/lib.js
var cssLib = [
	dir.csslib + 'reset.css',
	dir.csslib + 'bootstrap-grid.min.css',
	dir.csslib + 'owl.css',
	dir.csslib + 'grid.css',
	dir.csslib + 'aos.css',
];


// merge, compile, minify css files
gulp.task('css', function () {
	return gulp.src(dir.css)
		.pipe(concat('app.css'))
		.pipe(sass())
		.on('error', function (err) {
			gutil.log(err);
			this.emit('end');
		})
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))
		.pipe(cssnano())
		.pipe(gulp.dest(dir.buildCss))
});


// merge, compile, minify js files
gulp.task('js', function () {
	return gulp.src(dir.js)
		.pipe(concat('app.js'))
		.pipe(babel({
			presets: ['env']
		}))
		.pipe(uglify().on('error', function (uglify) {
			console.error(uglify);
			this.emit('end');
		}))
		.pipe(gulp.dest(dir.buildJs));
});

// merge all css lib files
gulp.task('csslib', function () {
	return gulp.src(cssLib)
		.pipe(concat('lib.css'))
		.pipe(sass())
		.on('error', function (err) {
			gutil.log(err);
			this.emit('end');
		})
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))
		.pipe(cssnano())
		.pipe(gulp.dest(dir.buildCss));
});

// merge all js lib files
gulp.task('jslib', function () {
	return gulp.src(jsLib)
		.pipe(concat('lib.js'))
		// .pipe(babel({
		//     presets: ['env']
		// }))
		// .pipe(uglify().on('error', function (uglify) {
		// 	console.error(uglify);
		// 	this.emit('end');
		// }))
		.pipe(gulp.dest(dir.buildJs));
});

// merge, compile, minify js files
gulp.task('images', function () {
	gulp.src(dir.img)
		.pipe(imagemin([
			imageminMozjpeg({
				quality: 50
			}),
			imagemin.optipng({
				optimizationLevel: 5
			}),
			imagemin.svgo({
				plugins: [{
						removeViewBox: true
					},
					{
						cleanupIDs: false
					}
				]
			})
		]))
		.pipe(gulp.dest(dir.buildImg));
});

// clear dist dir
gulp.task("clean", function () {
	return del([dir.buildCss + '*.css', dir.buildJs + '*.js', dir.buildImg + '*']);
});

// run all tasks
gulp.task('build', function () {
	gulp.start('css', 'js', 'csslib', 'jslib', 'images');
});

// watch for changes and run tasks
gulp.task('default', function () {
	gulp.watch(dir.img, ['images']);
	gulp.watch(dir.css, ['css']);
	gulp.watch(dir.js, ['js']);
});