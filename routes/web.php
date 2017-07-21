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
use App\Thread;

Route::get('/', function (Request $request) {
		$s = $request->input('search');
		$threads = Thread::latest()->paginate(20);
    return view('welcome', compact('threads', 's'));
});

Auth::routes();


// //resource route for all users
Route::resource('peninsulares', 'UsersController');
Route::get('{user}/edit', 'UsersController@edit')->name('edit-user');

// // resource route for threads
Route::resource('threads', 'ThreadsController');

Route::get('/threads/{slug}', 'ThreadsController@show');

// //resource route for comments
Route::resource('comments', 'CommentController', ['only'=>['update','destroy']]);

// //route for creating comment
Route::post('comments/create/{thread}','CommentController@addCommentToThread')->name('threadcomment.store');

// //route for replying to comment
Route::post('reply/create/{comment}','CommentController@addReplyToComment')->name('replycomment.store');

// //route for user profile
Route::get('/{user}', 'UserProfileController@index')->name('user_profile');

// //route for like
Route::post('/comment/like', 'LikeController@likeComment')->name('like');

// //route for vote
Route::post('/thread/vote', 'VoteController@voteThread')->name('vote');

// //route for marking thread as inappropriate
Route::post('/thread/mark', 'MarkThreadController@markAsInappropriateThread')->name('mark');

// //social authentication
Route::get('socialauth/{provider}', 'Auth\SocialAuthController@redirectToProvider');
Route::get('socialauth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');
