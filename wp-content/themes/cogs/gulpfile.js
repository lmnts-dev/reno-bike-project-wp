'use strict';
var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task("styles", function() {
  gulp
    .src("sass/*.scss")
    .pipe(sass().on("error", sass.logError))
    .pipe(gulp.dest('sass'));
});

gulp.task("watch", function() {
  gulp.watch("sass/*.scss", gulp.series("styles"));
});