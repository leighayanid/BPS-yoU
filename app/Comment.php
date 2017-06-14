<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	/*
		get all the owning commentable model
	*/	
    public function commentable(){
    	return $this->morphTo();
    }
}
