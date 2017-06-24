<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $guarded=[];

    public function votable(){
    	return $this->morphTo();
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
