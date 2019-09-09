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
var include = require("gulp-include");
var run = require('gulp-run');

var dir = {
	// gets minified, compiled - merged to /dist/css/app.css
	css: 'src/css/*',
	csslib: 'src/css/lib/*',

	// gets minified, compiled, prefixed - merged to /dist/js/app.js
	js: 'src/js/*',

	// gets minified, compiled - merged to /dist/js/lib.js -> app.js
	jslib: 'src/js/lib/*.js',

	php: '*.php',
	// images are first optimized
	img: 'src/img/**',

	// production dirs
	build: 'dist/',
	buildCss: 'dist/css/',
	buildJs: 'dist/js/',
	buildImg: 'dist/img/'
};

var messages = {
	error: '>>> ERROR LINE: ',
	uglify: '>>> ERROR ON MINIFICATION'
};

// merge, compile, minify css files
gulp.task('css', function () {
	return gulp.src(dir.css)
		.pipe(concat('app.css'))
		.pipe(sass({
			sourceMap: true
		}))
		.on('error', function (err) {
			console.error(messages.error + err.line + ' ' + err.relativePath);
			console.log(err.formatted);
			this.emit('end');
		})
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))
		.pipe(cssnano())
		.pipe(gulp.dest(dir.buildCss));
});


// merge, compile, minify js files
gulp.task('js', function () {
	return gulp.src([dir.jslib, dir.js])
		.pipe(concat('app.js'))
		.pipe(babel({
			presets: ['env']
		}))
		.on('error', function (e) {
			console.log(messages.error + e.loc.line);
			console.log(e.message + ' ' + e.name);
			this.emit('end');
		})
		.pipe(uglify().on('error', function (uglify) {
			console.error(messages.uglify);
			console.log(uglify);
			this.emit('end');
		}))
		.pipe(gulp.dest(dir.buildJs));
});

// merge, compile, minify js files
gulp.task('images', function () {
	gulp.src(dir.img)
		.pipe(imagemin([
			imageminMozjpeg({
				quality: 70
			}),
			imagemin.optipng({
				optimizationLevel: 5
			}),
			imagemin.svgo()
		]))
		.pipe(gulp.dest(dir.buildImg));
});

// clear dist dir
gulp.task("clean", function () {
	return del([dir.build]);
});

gulp.task('livereload', function () {
	return run('livereload').exec();
});

gulp.task('default', function () {
	gulp.watch([dir.csslib, dir.css], ['css']);
	gulp.watch([dir.jslib, dir.js], ['js']);
	gulp.watch(dir.img, ['images']);
	gulp.start('livereload');
});

gulp.task('build', function () {
	gulp.start('js');
	gulp.start('css');
	gulp.start('images');
});