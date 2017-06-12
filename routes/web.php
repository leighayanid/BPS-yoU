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
		$threads = App\Thread::latest()->paginate(20);
    return view('welcome', compact('threads'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// resource route for threads
Route::resource('threads', 'ThreadsController');
