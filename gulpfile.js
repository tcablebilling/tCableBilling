var elixir = require( 'laravel-elixir' );

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir.extend( 'sourcemaps', false );

elixir( function( mix ) {
	mix.sass( 'app.scss' );
	mix.scripts( [
		'/../../../node_modules/jquery/dist/jquery.js',
		'/../../../node_modules/jquery-ui-bundle/jquery-ui.min.js',
		'/../../../node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
		'/../../../node_modules/sweetalert/dist/sweetalert.min.js'
	], 'public/js/top.js' );
	mix.scripts( [
		'/../../../node_modules/jquery.nicescroll/jquery.nicescroll.min.js',
		'/../../../node_modules/icheck/icheck.min.js',
		'/../../../node_modules/datatables/media/js/jquery.dataTables.min.js',
		'/../../../node_modules/datatables-tabletools/js/dataTables.tableTools.js',
		'/../../../node_modules/moment/min/moment.min.js',
		'/../../../node_modules/daterangepicker/daterangepicker.min.js',
		'/../../../node_modules/select2/dist/js/select2.min.js',
		'validator.js',
		'app.js',
	], 'public/js/bottom.js' );
} );
