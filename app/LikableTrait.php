<?php

namespace App;

trait LikableTrait
{
    public function likes(){
    	return $this->morphMany(Like::class, 'likable');
    }

    public function likeThis(){
    	$like = new Like();
    	$like->user_id = auth()->user()->id;
    	$this->likes()->save($like);
    	return $like;
    }
}
