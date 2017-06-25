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
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
		$s = $request->input('search');
		$threads = App\Thread::latest()->paginate(20);
    return view('welcome', compact('threads', 's'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// resource route for threads
Route::resource('threads', 'ThreadsController');

//resource route for comments
Route::resource('comments', 'CommentController', ['only'=>['update','destroy']]);

//route for creating comment
Route::post('comments/create/{thread}','CommentController@addCommentToThread')->name('threadcomment.store');

//route for replying to comment
Route::post('reply/create/{comment}','CommentController@addReplyToComment')->name('replycomment.store');

//route for user profile
Route::get('/{user}', 'UserProfileController@index')->name('user_profile');

//route for like
Route::post('/comment/like', 'LikeController@likeComment')->name('like');

//route for vote
Route::post('/thread/vote', 'VoteController@voteThread')->name('vote');