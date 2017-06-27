<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //creates relationship to user
    public function threads(){
        return $this->hasMany('App\Thread');
    }

    public function getRouteKeyName(){
        return 'username';
    }

    public function scopeSearch($query, $s){
        return $query->where('name', 'like', '%' .$s. '%')
            ->orWhere('username', 'like', '%' .$s. '%');
    }
}
