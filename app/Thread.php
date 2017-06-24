<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{	

	use VotableTrait;
	
	protected $fillable=['subject', 'type', 'thread', 'user_id'];

	// creates relationship to user
	public function user(){
		return $this->belongsTo(User::class);
	}

	public function comments(){
		return $this->morphMany(Comment::class, 'commentable')->latest();
	}

	public function scopeSearch($query, $s){
		return $query->where('subject', 'like', '%' .$s. '%')
			->orWhere('thread', 'like', '%' .$s. '%');
	}

}
