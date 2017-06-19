<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Comment;
use App\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index(User $user){
    	
    	$threads = Thread::where('user_id', $user->id)->latest()->paginate(10);
    	$comments = Comment::where('user_id', $user->id)->where('commentable_type', 'App\Thread')->paginate(10);

    	return view('profile.index', compact('threads', 'comments', 'user'));

    }
}
