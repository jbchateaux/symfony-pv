import javascripts from 'gulp-javascripts'
import styles from 'gulp-styles'
import sprite from 'gulp-sprite'
import images from 'gulp-images'
import fonts from 'gulp-fonts'
import gulp from 'gulp'

const compile = gulp.parallel(javascripts(), gulp.series(sprite(), styles(), images()), fonts())

const watch = function() {
    gulp.watch("assets/scss/**/*.scss", styles())
    gulp.watch("assets/js/**/*.js", javascripts())
    gulp.watch('assets/fonts/**/*.ttf', fonts())
    gulp.watch(['assets/img/**/*.{jpg,png,gif,svg}', '!assets/img/icons/*.png'], images())
    gulp.watch('assets/img/icons/*.png', sprite())
}

export {
    compile,
    watch
}