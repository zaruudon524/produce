<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Museumkind extends Model
{
    public function museum()
    {
        return $this->belongsTo(Museum::class, 'body_id');
    }
    
    protected $primaryKey = 'body_id';
    public $incrementing = false;
}
