let gulp = require("gulp");

// General utilities
let del = require('del'),
    runSequence = require('run-sequence'),
    rename = require('gulp-rename');

// Sass and CSS
let sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minify = require('gulp-clean-css');

// JavaScript
let browserify = require('browserify'),
    babel = require('gulp-babel'),
    source = require('vinyl-source-stream'),
    buffer = require('vinyl-buffer'),
    uglify = require('gulp-uglify');


gulp.task('clean', function () {
  return del(['../dist/**/*'], { force: true });
});


gulp.task('build:sass', function () {
  return gulp.src('../sass/main.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(minify())
    .pipe(rename('styles.min.css'))
    .pipe(gulp.dest('../dist'));
});

gulp.task('build:js', () => {
  let b = browserify({
    entries: '../js/entry.js',
    debug: true
  });
  
  return b.bundle()
    .pipe(source('entry.js'))
    .pipe(buffer())
    .pipe(babel({
      presets: ['@babel/env']
    }))
    .pipe(uglify())
    .pipe(rename('scripts.min.js'))
    .pipe(gulp.dest('../dist'));
});

gulp.task('default', function () {
  runSequence('clean', 'build:sass', 'build:js');
});



gulp.task('watch', function () {
  gulp.watch('../sass/**/*.scss', ['build:sass']);
  gulp.watch('../js/**/*.js', ['build:js']);
});