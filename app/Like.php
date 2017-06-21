<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded=[];

    public function likes(){
    	return $this->morphMany(Comment::class, 'commentable');
    }

    public function likable(){
    	return $this->morphTo();
    }
}
