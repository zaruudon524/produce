<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pref extends Model
{
    public function museum()
    {
        return $this->belongsTo(Museum::class, 'place_id');
    }
    
    protected $primaryKey = 'place_id';
    public $incrementing = false;
}
