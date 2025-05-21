'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var connect = require('gulp-connect');

sass.compiler = require('node-sass');

gulp.task('sass', function () {
  return gulp.src('./sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./'))
    .pipe(connect.reload());
});

gulp.task('connect', function() {
  connect.server({
      livereload: true
  });
});

gulp.task('watchMyStyles', function() {
  gulp.watch('./sass/**/*.scss', ['sass']);
});

gulp.task('default', ['watchMyStyles', 'connect']);
