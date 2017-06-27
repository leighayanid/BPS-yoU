<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Thread extends Model
{	

	use VotableTrait;
	use Sluggable;
	
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

	/**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'subject'
            ]
        ];
    }

}
