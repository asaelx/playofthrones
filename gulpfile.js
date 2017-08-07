var gulp         = require('gulp'),
    sass         = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    uglify       = require('gulp-uglify'),
    concat       = require('gulp-concat'),
    livereload   = require('gulp-livereload'),
    notify       = require('gulp-notify');

gulp.task('styles', function() {
    return gulp.src([
                'assets/sass/master.sass',
                'node_modules/glidejs/dist/css/glide.core.min.css',
                'node_modules/flipclock/compiled/flipclock.css'
            ])
            .pipe(sass().on('error', sass.logError))
            .pipe(concat('master.css'))
            .pipe(autoprefixer())
            .pipe(gulp.dest('public/css'))
            .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
            .pipe(livereload())
            .pipe(notify('Looking good!'))
});

gulp.task('scripts', function() {
    return gulp.src([
                'node_modules/jquery/dist/jquery.min.js',
                'node_modules/glidejs/dist/glide.min.js',
                'node_modules/flipclock/compiled/flipclock.min.js',
                'node_modules/webtorrent/webtorrent.min.js',
                'assets/js/scripts.js'
            ])
            .pipe(concat('scripts.js'))
            // .pipe(uglify())
            .pipe(gulp.dest('public/js'))
            .pipe(livereload())
            .pipe(notify('Magic!'))
});

gulp.task('watch', function() {
    livereload.listen();
    gulp.watch('assets/sass/*.sass', ['styles']);
    gulp.watch('assets/js/*.js', ['scripts']);
});

gulp.task('default', ['watch']);
