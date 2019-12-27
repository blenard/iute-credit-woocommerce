var gulp = require('gulp'),
    autoprefixer = require('gulp-autoprefixer'),
    autoprefixerOptions = {
        overrideBrowserslist: ['last 2 versions']
    },
    sass = require('gulp-sass'),
    fileinclude = require('gulp-file-include'),
    minify = require('gulp-minify');

gulp.task('sass', () => {
    return gulp
        .src(['./assets/src/sass/app.scss', './assets/src/sass/iute-admin.scss'])
        .pipe(sass({ outputStyle: 'expanded' }).on('error', sass.logError))
        .pipe(gulp.dest('./assets/dist/css'))
        .pipe(autoprefixer(autoprefixerOptions))
        .pipe(gulp.dest('./assets/dist/css'));
});

gulp.src('./node_modules/jquery/dist/jquery.min.js').pipe(gulp.dest('./assets/dist/js/'));

gulp.task('js', () => {
    return gulp
        .src('./assets/src/js/app.js')
        .pipe(
            fileinclude({
                prefix: '@@',
                basepath: '@file'
            })
        )
        .pipe(minify())
        .pipe(gulp.dest('./assets/dist/js'));
});

gulp.task('adminJs', () => {
    return gulp
        .src('./assets/src/js/admin.js')
        .pipe(gulp.dest('./assets/dist/js'));
});

gulp.task('default', () => {
    gulp.watch(['./assets/src/sass/*.scss', './assets/src/sass/**/*.scss'], gulp.series('sass'));
    gulp.watch('./assets/src/js/*.js', gulp.series('js'));
    gulp.watch('./assets/src/js/*.js', gulp.series('adminJs'));
});