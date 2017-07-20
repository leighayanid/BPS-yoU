<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Thread extends Model
{	

	use CommentableTrait, VotableTrait, MarkableTrait;
	use Sluggable;
	
	protected $fillable=['subject', 'type', 'thread', 'college', 'user_id'];

	// creates relationship to user
	public function user(){
		return $this->belongsTo(User::class);
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
