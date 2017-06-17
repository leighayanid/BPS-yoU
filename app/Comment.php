<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	protected $fillable = ['body', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }
	/*
		get all the owning commentable model
	*/	
    public function commentable(){
    	return $this->morphTo();
    }
}
