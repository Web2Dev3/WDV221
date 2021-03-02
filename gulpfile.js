var gulp = require('gulp'); 
var cssnano = require('gulp-cssnano'); 
var sass = require('gulp-sass'); 
var imagemin = require('gulp-imagemin');
var fileinclude = require('gulp-file-include');
var concat = require('gulp-concat'); 
var uglify = require('gulp-uglify');


gulp.task('sass', function(){    
    return gulp.src('app/style.scss')       
        .pipe(sass())       
        .pipe(cssnano())       
        .pipe(gulp.dest('dist/css')); 
});

gulp.task('images', function(){    
    return gulp.src('app/images/*')       
        .pipe(imagemin())              
        .pipe(gulp.dest('dist/images')); 
});

gulp.task('scripts', function(){    
    return gulp.src('app/*.js')       
        .pipe(concat('all.js'))             
        .pipe(gulp.dest('dist/js')); 
});

gulp.task('fileinclude', async function() {
  gulp.src(['index.html'])
    .pipe(fileinclude({
      prefix: '@@',
      basepath: '@file'
    }))
    .pipe(gulp.dest('./'));
});

gulp.task('watch', function(){       
    gulp.watch('app/*.scss', gulp.series('sass')); 
    gulp.watch('app/images/*', gulp.series('images'));
    gulp.watch('app/*.js', gulp.series('scripts'));          
    gulp.watch('*.html', gulp.series('fileinclude')); 
});

gulp.task('default', gulp.series('sass', 'images', 'scripts', 'fileinclude', 'watch'));