<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', function () {
	$pensiones = App\Pension::orderBy('visits', 'DESC')->take(15)->get();

    return view('pages.home', ['pensiones'=> $pensiones]);
});


/* get */
Route::get('/pensiones','PensionController@pensiones');


Route::get('/pension/{id}/{title}', 'PensionController@onePension')->where('id', '[0-9]+');


/* Create */
Route::get('/pension/create', 'PensionController@create');
Route::post('/pension/create', 'PensionController@create');

/* update */
Route::get('/pension/update/{id}', 'PensionController@update');
Route::post('/pension/update/{id}', 'PensionController@update');

/* delete */
Route::get('/pension/delete/{id}', 'PensionController@delete');



/*  Login */

Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@login');

Route::get('logout', 'AuthController@logout');

/* User pensiones*/
Route::get('/user/pensiones', 'PensionController@userPensiones');
Route::post('/user/favoritos/{id}', 'PensionController@userFavoritos');

Route::get('/user/favoritos', 'PensionController@favoritos');



/* Otros */

Route::get('/generarSitemap', function(){
	$pensiones = App\Pension::orderBy('visits','DESC')->get();
	
	
	$file = fopen("sitemap.xml","w");

	fwrite($file, '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'.PHP_EOL);
	fwrite($file, '	<url>
		<loc>https://buscapension.com/</loc>
		<priority>1.0</priority>
	</url>'.PHP_EOL);


	foreach ($pensiones as $pension) {
		fwrite($file, '	<url>
		<loc>https://buscapension.com/pension/'.$pension->id.'/'.str_slug($pension->title).'</loc>
		<priority>0.8</priority>
	</url>'.PHP_EOL);;
	}

	fwrite($file, '</urlset>'.PHP_EOL);

	fclose($file);

});