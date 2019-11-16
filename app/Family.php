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
}
