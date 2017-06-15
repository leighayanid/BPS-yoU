<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Thread extends Model
{

	use Sluggable;

	protected $fillable=['subject', 'type', 'thread', 'user_id', 'slug'];

	// creates relationship to user
	public function user(){
		return $this->belongsTo('App\User');
	}

	public function comments(){
		return $this->morphMany('App\Comment', 'commentable');
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
