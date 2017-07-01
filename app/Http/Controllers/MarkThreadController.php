<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Thread;

class MarkThreadController extends Controller
{
     public function markAsInappropriateThread(){

    	
    	$threadId = Input::get('threadId');
    	$mark = Thread::find($threadId);
    	
    	//check first if the commnet has been liked

        if(!$mark->isMarked()){

            $mark->markThis();
            return response()->json(['status'=>'success','message'=>'marked']);
        }else{
            $mark->unmarkThis();
            return response()->json(['status'=>'success','message'=>'unmarked']);

        }
    }
}
