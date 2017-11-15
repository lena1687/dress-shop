'use strict';

let path = require('path');

let gulp = require('gulp');
let gulpLoadPlugins = require('gulp-load-plugins');
let plugins = gulpLoadPlugins();

let root = './bitrix/templates/dress/';

gulp.task('sass', function () {
    return gulp.src(root + 'sass/**/*.sass')
        .pipe(plugins.sass().on('error', function(e) { this.emit('end'); console.log(e); }))
        .pipe(plugins.concat('style.css'))
        .pipe(plugins.autoprefixer({
            browsers: [
                'last 3 versions',
                'iOS >= 8',
                'Safari >= 8'
            ],
            cascade: false
        }).on('error', function(e) { this.emit('end'); console.log(e); }))
        .pipe(plugins.minifyCss())
        .pipe(plugins.rename({suffix: '.min'}))
        .pipe(gulp.dest(root + 'css'));
});

gulp.task('watch', function() {
    gulp.watch(root + 'sass/**/*.sass', ['sass']);  // Watch all the .sass files, then run the less task
});

gulp.task('default', ['sass', 'watch']);