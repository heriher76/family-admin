<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = ['message', 'user_id', 'family_id'];

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function family()
    {
    	return $this->belongsTo('App\Family', 'family_id');
    }
}
