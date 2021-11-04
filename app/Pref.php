<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pref extends Model
{
    public function museums()
    {
        return $this->hasMany('App\Museum', 'place_id');
    }
    
    // protected $primaryKey = 'place_id';
    // public $incrementing = false;
}
