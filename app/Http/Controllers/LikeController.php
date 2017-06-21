<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Comment;

class LikeController extends Controller
{
    public function likeComment(){
    	$commentId = Input::get('commentId');
    	$comment = Comment::find($commentId);
    	$comment->likeThis();
    	return response()->json(['status' => 'success']);
    }
}
