const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const rename = require('gulp-rename');
const plumber = require('gulp-plumber');
const babel = require('gulp-babel');
const terser = require('gulp-terser');



gulp.task('watch', function(){
    gulp.watch(['*.scss', './src/styles/**/*.scss'], gulp.parallel(['styleCSS']));
});




gulp.task('styleCSS', async () => {
    return gulp.src('*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({style: 'compressed'}).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./'))
    }
);