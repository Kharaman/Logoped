/* 
* Path to folder which contains all Less files.
* Path related to gulpfile.js location
*/
var sass_src = 'www/scss/';

/* 
* Name of the main Less file inside Less source folder
*/
var sass_main_filename = 'materialize';
// var less_main_filename = 'landing';

/*
* Path to folder which will contain all result CSS files
*/
var css_dest = 'www/css/';

/* 
* Name of the main Less file inside Less source folder
*/
var css_result_filename = 'style';
// var css_result_filename = 'landing';

/*
* List of JS files which should be concatenated.
*/
var js_concat_files = ['www/js/materialize.min.js', 'www/js/lolliclock.js', 'www/js/app.js'];

/* 
* Concatenated JS file.
*/
var js_concat_res_path = 'www/js/';
var js_concat_res_file = 'script.js';

/*
* List of required pugins
*/
var gulp = require('gulp');
var path = require('path');
var sass  = require('gulp-sass');
var minifyCSS = require('gulp-minify-css');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var browserSync = require('browser-sync');



var indexFile = 'www/index.html';
var sassFiles = sass_src + '**/*.scss';
var sassMain = sass_src + '' + sass_main_filename + '.scss';

gulp.task('sass', function() {	
	return gulp.src(sassMain)
	.pipe(sass({
		generateSourceMap: true,
		      paths: [ path.join(__dirname, 'less') ]
	}))
	.on('error', swallowError)
	.pipe(rename({
		basename: css_result_filename
	}))
	.pipe(gulp.dest(css_dest));
});

gulp.task('minify-css', function() {
	gulp.src(css_dest+css_result_filename+'.css')
    		.pipe(minifyCSS({keepBreaks:true}))
    		.pipe(rename({
    			basename: css_result_filename,
    			suffix: '.min'
    		}))
   		.pipe(gulp.dest(css_dest))
});

gulp.task('js-concat', function() {
	gulp.src(js_concat_files)
		.pipe(concat(js_concat_res_file))
		.pipe(gulp.dest(js_concat_res_path))
		.pipe(uglify())
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(gulp.dest(js_concat_res_path))
		.on('error', swallowError)
});


var localhost = '192.168.1.56';
// var localhost  = '192.168.1.18';
gulp.task('browser-sync', function() {
	browserSync.init({
        		
			proxy: 'http://logoped/'
		
    });
});

gulp.task('browser-reload', ['sass'], function() {
	browserSync.reload();
});


gulp.task('watch',function () { 
	gulp.start(['browser-sync','sass']);
	gulp.watch(indexFile,['browser-reload']);
	gulp.watch(sassFiles,['browser-reload']);
	//gulp.watch(lessFiles,['less','minify-css']);
	gulp.watch(js_concat_files,['js-concat']);
});

gulp.task('default', ['sass','js-concat','watch']);

function swallowError (error) {
	console.log(error.toString());
	this.emit('end');
}

