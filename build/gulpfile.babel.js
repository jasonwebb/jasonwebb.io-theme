let browserify = require('browserify'),
    gulp = require('gulp'),
    source = require('vinyl-source-stream'),
    buffer = require('vinyl-buffer'),
    del = require('del'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    babel = require('gulp-babel'),
    sass = require('gulp-sass'),
    minify = require('gulp-clean-css'),
    autoprefixer = require('gulp-autoprefixer'),
    rename = require('gulp-rename');

// Define folders
const folders = {
  sass: '../sass',
  js: '../js',
  dist: '../dist'
}

// Define globs
const globs = {
  sass: folders.sass + '/**/*.scss',
  js: folders.js + '/**/*.js',
  dist: folders.dist + '/**/*'
};


//=============
//  CLEAN
//=============
gulp.task('clean', () => {
  return del(globs.dist, {
    force: true
  });
});


//=============
//  BUILD
//=============
// Build CSS
gulp.task('build:sass', () => {
  return gulp.src(globs.sass)
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(minify())
    .pipe(concat('style.min.css'))
    .pipe(gulp.dest(folders.dist))
});

// Build JS
gulp.task('build:js', () => {
  var b = browserify({
    entries: folders.js + '/app.js',
    debug: true
  });

  return b.bundle()
    .pipe(source('app.js'))
    .pipe(buffer())
    .pipe(babel({
      presets: ['@babel/env']
    }))
    .pipe(uglify())
    .pipe(rename('app.min.js'))
    .pipe(gulp.dest(folders.dist));
});

// Build all
gulp.task('build', ['clean', 'build:sass', 'build:js']);


//=============
//  WATCH
//=============
gulp.task('watch', () => {
  gulp.watch(globs.sass, ['build:sass']);
  gulp.watch(globs.js, ['build:js']);
});


//=============
//  DEFAULT
//=============
gulp.task('default', ['build', 'watch']);