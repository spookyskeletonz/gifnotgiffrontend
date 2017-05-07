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
    return view('welcome');
});
Route::post('/', function() {
	return view('welcome');

});
Route::get('verify', function() {
     $instrumentcode = Input::get('instrumentcode');
     $instrumentcode2 = Input::get('instrumentcode2');
     $topiccode = Input::get('topiccode');
     $topiccode2 = Input::get('topiccode2');
     $path = storage_path('app/gifnotgif.jar');
     $result = shell_exec("java -jar $path $instrumentcode $instrumentcode2 $topiccode $topiccode2");
     var_dump($result);
});

