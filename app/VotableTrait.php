<?php

namespace App;

trait VotableTrait
{
    
    public function votes(){

    	return $this->morphMany(Vote::class, 'votable');
    
    }

    public function upvote(){

    	$vote = new Vote();
    	$vote->user_id = auth()->user()->id;
    	$this->votes()->save($vote);
    	return $vote;

    }

    public function downvote(){

    	$this->votes()->where('user_id',auth()->id())->delete();

    }

    public function isVoted(){

        return !!$this->votes()->where('user_id',auth()->id())->count();

    }

}
