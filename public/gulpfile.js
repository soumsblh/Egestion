(function () {
    'use strict';

    var gulp = require('gulp');
    var bs = require('browser-sync').create(); // create a browser sync instance.

    gulp.task('browser-sync', function () {
        bs.init({
            server: {
                baseDir: "./"
            }
        });
    });

    gulp.task('watch', ['browser-sync'], function () {
        gulp.watch("js/**/*.*.js").on('change', bs.reload);
        gulp.watch("js/**/*.*.html").on('change', bs.reload);
        gulp.watch("js/*.js").on('change', bs.reload);
        gulp.watch("*.html").on('change', bs.reload);
    });
})();