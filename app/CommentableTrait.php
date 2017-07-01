<?php

namespace App;

trait CommentableTrait
{
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable')->latest();
    }

}
