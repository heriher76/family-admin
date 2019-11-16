<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
    	return $this->hasMany('App\User', 'family_id');
    }
    public function events()
    {
    	return $this->hasMany('App\Event', 'family_id');
    }
    public function chats()
    {
    	return $this->hasMany('App\Chat', 'family_id');
    }
}
