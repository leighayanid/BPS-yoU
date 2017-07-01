<?php

namespace App;

trait MarkableTrait
{
    public function marks(){

    	return $this->morphMany(Mark::class, 'markable');
    
    }

    public function markThis(){

    	$mark = new Mark();
    	$mark->user_id = auth()->user()->id;
    	$this->marks()->save($mark);
    	return $mark;

    }

    public function unmarkThis(){

    	$this->marks()->where('user_id',auth()->id())->delete();

    }

    public function isMarked(){

        return !!$this->marks()->where('user_id',auth()->id())->count();

    }
}
