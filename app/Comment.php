<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use LikableTrait, CommentableTrait;

	protected $fillable = ['body', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

	/*
		get all the owning commentable model
	*/	
    public function commentable(){
    	return $this->morphTo();
    }
}
