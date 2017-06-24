<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Vote;
use App\Thread;

class VoteController extends Controller
{
    public function voteThread(){
    	
    	$threadId = Input::get('threadId');
    	$vote = Thread::find($threadId);
    	
    	//check first if the commnet has been liked

        $vote->upvote();
        return response()->json(['status'=>'success','message'=>'voted']);
       /* if(!$vote->isVoted{

        }else{

            $vote->downvote();
            return response()->json(['status'=>'success','message'=>'unvoted']);

        }*/
    }
}
