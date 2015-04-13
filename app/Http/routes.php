<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|   NombredelControlador@nombreDeLaAccion
 * 
 * Route::pattern('id','\d+'); // indico que id sera un numero ..ruta/{id}
 * ejemplo : Route::get('ruta/{id}', function($id){
 * return 'accediendo a '. $id;
 * });
 * GET url _ recibe peticiones
 * POST url _ envio de datos
 */

// esta forma esta ligada a controlador@accion
// al metodo accion podre tener como parametro algun atributo que se le pasara con get.

//De la siguiente manera usamos csrf para obtener el token de seguridad.
//Route::when('*','csrf','POST'); // FORMA DE ACTIVARLO

Route::get('/', 'WelcomeController@index');

Route::get('auth','AuthWelcomeController@index');

Route::get('test', 'TestController@index');

Route::get('home', 'HomeController@index');

//Route::get('socios/orm', 'UsersController@getOrm');

Route::get('envios', 'TestController@param');

Route::get('contact',
        ['as' => 'contact','uses' => 'AboutController@create']);

// post para uso generico de formularios. por tanto uso de CSRF
Route::post('contact',
        ['as' => 'contact_store', 'uses' => 'AboutController@store']);

// controlador de tipo resource


/* de estaforma se enrouta a un controlador, la ruta estará atada a la acción
 los metodos de la clase del controladoor tendrán que empezar por getNombre o por postNombre
 entonces podremos acceder de la forma Nombre , o Nombre/id (siendo id un numero por ejemplo) */
Route::controllers([
        //'users' => 'HomeController', #aceso a getORM con /users/orm
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


/*Route::group(['middleware'=>'auth','namespace' => 'Admin'],function(){
   Route::get();
    
});*/


/**
 * Aqui vamos a controlar el uso de las rutas en el constructor.
 */
Route::group(['prefix' => 'admin','namespace' => 'Admin'], function(){
    Route::get('avanzado','UsersController@avanzado');
    Route::resource('users','UsersController');
});


  Route::post('contact',
        ['as' => 'contact_store', 'uses' => 'AboutController@store']);

 Route::post('register',
         ['as' => 'register.add','uses' => 'AboutController@registrar']
         );
 
Route::post('update',
         ['as' => 'perfil.update','uses' => 'AboutController@update']
         );

Route::group(['namespace' => 'Admin'],function(){
    
    Route::get('appeals','ProfileController@appeals');
    Route::put('appeals/remove',
        ['as' => 'appeals.remove', 'uses' => 'ProfileController@appremove']);  
    Route::get('help','ProfileController@help');
    Route::resource('profile','ProfileController');
});



Route::get('socios', 'HomeController@index');



//Route::get('admin/home/myprofile','HomeController@myprofile');
//Route::resource('uprofile');