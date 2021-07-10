const gulp = require("gulp");
const {parallel, series} = require("gulp");

const uglify = require("gulp-uglify");
const sass = require('gulp-sass')(require('sass'));
const concat = require("gulp-concat");
const autoprefixer = require('gulp-autoprefixer');
const babel = require('gulp-babel');
const rename = require('gulp-rename');

// Scripts
function js(cb) {
  gulp.src("../js/entry.js")
    .pipe(babel({
      presets: ['@babel/preset-env']
    }))
    .pipe(rename("scripts.min.js"))
    .pipe(uglify())
    .pipe(gulp.dest("../dist"));
  cb();
}

// Compile Sass
function css(cb) {
  gulp.src("../sass/main.scss")
    .pipe(sass({
      outputStyle: "compressed"
    }).on("error", sass.logError))
    .pipe(autoprefixer({
      browserlist: ['last 2 versions'],
      cascade: false
    }))
    .pipe(concat("styles.min.css"))
    .pipe(gulp.dest("../dist"));
  cb();
}

// Watch Files
function watch_files() {
  gulp.watch("../sass/**/*.scss", css);
  gulp.watch("../js/*.js", js);
}

// Default 'gulp' command with start local server and watch files for changes.
exports.default = series(css, js, watch_files);

// 'gulp build' will build all assets but not run on a local server.
exports.build = parallel(css, js);