<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();
Route::resource('index','IndexUserController');
Route::resource('indexNotice','IndexNoticeController');
Route::resource('indexT','IndexTeacherController');
Route::resource('usuario','UsersController');
Route::resource('lineaInvestigacion','LineInvestigationController');
Route::resource('grupoLinea','Group_LineController');
Route::resource('facultad','FacultyController');
Route::resource('areaGrupo','Area_GroupController');
Route::resource('userGrupo','UserHotbedController');
Route::resource('escuela','SchoolController');
Route::resource('grupo','GroupController');
Route::resource('semillero','HotbedController');
Route::resource('proyecto','ProjectController');
Route::resource('userSemillero','UserHotbedController');
Route::resource('centroInvestigacion','ResearchCenterController');
Route::resource('areaInvestigacion','ResearchAreaController');

Route::resource('noticia','NoticeController');
Route::resource('productividad','ProductivityController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('usuario/images/{filename}',function($filename){

	$path=storage_path("app/images/$filename");
	
	if (!\File::exists($path)) abort(404);
	
	$file=\File::get($path);
	$type=\File::mimeType($path);
	$response=Response::make($file,200);
	$response->header("Content-Type",$type);
	return $response;

});
Route::get('noticia/noticiaImages/{filename}',function($filename){

	$path=storage_path("app/noticiaImages/$filename");
	
	if (!\File::exists($path)) abort(404);
	
	$file=\File::get($path);
	$type=\File::mimeType($path);
	$response=Response::make($file,200);
	$response->header("Content-Type",$type);
	return $response;

});
Route::get('productividad/productividadFiles/{filename}',function($filename){

	$path=storage_path("app/productividadFiles/$filename");
	
	if (!\File::exists($path)) abort(404);
	
	$file=\File::get($path);
	$type=\File::mimeType($path);
	$response=Response::make($file,200);
	$response->header("Content-Type",$type);
	return $response;

});

