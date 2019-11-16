<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name', 'date', 'family_id'];

    public function family()
    {
        return $this->belongsTo('App\Family', 'family_id');
    }
}
