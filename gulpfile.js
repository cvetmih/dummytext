// Include gulp
var gulp = require('gulp');


// JS

 // Include plugins
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var stripDebug = require('gulp-strip-debug');
 // Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp.src('js/*.js')
      .pipe(concat('main.js'))
        // .pipe(stripDebug())
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('build/js'));
});

// CSS

var sass = require('gulp-ruby-sass');
 gulp.task('sass', function() {
    return sass('scss/main.scss', {style: 'compressed'})
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('build/css'));
});


// IMAGE OPTIMALIZATION

var imagemin = require('gulp-imagemin');
var cache = require('gulp-cache');
 gulp.task('images', function() {
  return gulp.src('img/**/*')
    .pipe(cache(imagemin({ optimizationLevel: 5, progressive: true, interlaced: true })))
    .pipe(gulp.dest('build/img'));
});


// WATCH FOR CHANGES

gulp.task('watch', function() {
   // Watch .js files
  gulp.watch('js/*.js', ['scripts']);
   // Watch .scss files
  gulp.watch('scss/*.scss', ['sass']);
   // Watch image files
  gulp.watch('img/**/*', ['images']);
 });





// Default Task
gulp.task('default', ['scripts', 'sass', 'images', 'watch']);
