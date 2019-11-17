var gulp = require('gulp');
var uglyfly = require('gulp-uglyfly');
var cleanCSS = require('gulp-clean-css');
var replace = require('gulp-replace');

gulp.task('compress-js', async function() {
	gulp.src('static/**/*.js')
		.pipe(uglyfly())
		.pipe(gulp.dest('dist'))
});

gulp.task('minify-css', async function() {
	gulp.src('static/**/*.css')
		.pipe(cleanCSS({compatibility: 'ie8'}))
		.pipe(gulp.dest('dist'));
});

gulp.task('rename-bg-images', async function() {
	gulp.src('dist/css/style.css')
		.pipe(replace('../images', '../../static/images'))
		.pipe(gulp.dest('dist/css'));
});

gulp.task('default', gulp.series('compress-js', 'minify-css'));
