/*==============================================================================
##  Elisa Keane // August 2016
==============================================================================*/

/*******************************************************************************
## Require Stuff
*******************************************************************************/

/* Globals */
'use strict';

var onError = function (err) {  
  gutil.beep();
  console.log(gutil.colors.red('Error: '), err.message);
};

var siteurl = 'elisakeanedesign.dev';

var gulp = require ('gulp'),                                
    uglify = require ('gulp-uglify'),                       
    sass = require ('gulp-ruby-sass'),                          
    plumber = require ('gulp-plumber'),                    
    browserSync = require('browser-sync'),                 
    autoprefixer = require('gulp-autoprefixer'),          
	sourcemaps = require('gulp-sourcemaps'),
    concat = require('gulp-concat'),                      
    rename = require("gulp-rename"),                      
    jshint = require('gulp-jshint'),                        
    minifycss = require('gulp-cssnano'),                
    stylish = require('jshint-stylish'),
    gutil = require('gulp-util'),
	size = require('gulp-filesize'),
	notify = require('gulp-notify'),
	imagemin = require('gulp-imagemin'),
    bower = require('gulp-bower'),	
    neat = require('node-neat').includePaths;


/*******************************************************************************
## PATHS Source & Destination 
*******************************************************************************/

var themeFolder = 'ekeane';
var	themePath = 'content/themes/';
var path = {
	bowerDir : 'bower_components/',
	themeFolder : themeFolder,
	themePath : themePath,
    sass_src : 'src/scss/elisa.scss',                               
	// where to put minified css
    sass_dest : themePath + themeFolder + '/assets/css',                            
	// all js that should be linted
    js_lint_src : [                                         
        themePath + themeFolder + '/assets/js/*.js'
    ],
    // all js files that should not be concatinated  
    js_uglify_src : [
        'src/js/libs/*.js'
    ],
	// all js files that should be concatinated
    js_concat_src : [                                       			
        'src/js/*.js'
    ],
	// where to put minified js
    js_dest : themePath + themeFolder + '/assets/js'                                   


};

/*******************************************************************************
## JS TASKS
*******************************************************************************/

gulp.task('js-lint', function() {
    gulp.src(path.js_lint_src)                            
        .pipe(jshint().on('error', gutil.log))                                     
        .pipe(jshint.reporter(stylish))                     
});

gulp.task('js-uglify', function() {
    gulp.src(path.js_uglify_src)                         
        .pipe(uglify())                                     
        .pipe(rename(function(dir,base,ext){                
	        var trunc = base.split('.')[0];
            return trunc + '.min' + ext;
        }))
        .pipe(gulp.dest(path.js_dest))
 		.pipe(notify({ message: 'ugly task complete', onLast: true }));

});

gulp.task('js-concat', function() {
    gulp.src(path.js_concat_src)  
        .pipe(uglify().on('error', gutil.log))    
        .pipe(concat('main.min.js')) 
        .pipe(gulp.dest(path.js_dest))
		.pipe(notify({ message: 'js concat task complete', onLast: true }));

});

/*******************************************************************************
## BOWER
*******************************************************************************/

gulp.task('bower', function() {
    return bower()
       .pipe(gulp.dest(path.bowerDir))
});

/*******************************************************************************
## ICONS
*******************************************************************************/

gulp.task('icons', function() {
    return gulp.src(path.bowerDir + 'font-awesome/fonts/**.*')
    	.pipe(gulp.dest('src/fonts/'));
});

/*******************************************************************************
## SASS 
*******************************************************************************/

gulp.task('sass', function(){
    var s = size();
 
	return sass(path.sass_src, {
			sourcemap: true,
			style: 'compressed',
			loadPath: [
                path.bowerDir + '/font-awesome/scss',
			]
			
			})
	    .on('error', gutil.log)
        .pipe(s)

        .pipe(autoprefixer())
//        .pipe(minifycss())               
	    .pipe(sourcemaps.write('maps', {
	      includeContent: false,
	      sourceRoot: 'source'
	    }))
        .pipe(gulp.dest(path.sass_dest))
		.pipe(notify({ message: 'sass task complete', onLast: true }));

});

/*******************************************************************************
## IMAGES
*******************************************************************************/
gulp.task('images', function() {
  return gulp.src(['src/images/raw/**/*.{png,jpg,gif}'])
    .pipe(imagemin({ optimizationLevel: 5, progressive: true, interlaced: true }))
    .pipe(gulp.dest('src/images/'))
    .pipe(gulp.dest(path.themePath + path.themeFolder + '/assets/images/'))
    .pipe(notify({ message: 'images task complete', onLast: true }));
});


/*******************************************************************************
## BROWSER SYNC
*******************************************************************************/

gulp.task('browser-sync', function() {
    browserSync.init([path.themePath + path.themeFolder + '/assets/css/*.css', path.themePath + path.themeFolder + '/assets/js/*.js', '*.html'], {
		proxy: siteurl
    });
});

/*******************************************************************************
##  WATCH TASKS
*******************************************************************************/

gulp.task('watch', function(){
    gulp.watch('src/js/**/*.js', ['js-lint', 'js-uglify', 'js-concat']);    //Watch Scripts
    gulp.watch('src/scss/**/*.scss', ['sass']);                             //Watch Styles
	gulp.watch('src/images/**/*.{png,jpg,gif}', ['images']);

});

/*******************************************************************************
##  GULP TASKS
*******************************************************************************/

gulp.task('default', ['js-uglify', 'js-lint', 'js-concat', 'images', 'bower', 'icons', 'sass', 'watch', 'browser-sync']);
