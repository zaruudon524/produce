<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Museumkind extends Model
{
    public function museums()
    {
        return $this->hasMany('App\Museum', 'body_id');
    }
    
    // protected $primaryKey = 'body_id';
    // public $incrementing = false;
}
