<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
    'title',
    'body',
    'museum_id'
];

public function museums()
  {
    $museums = App\Review::find(museum_id)->museums();
    return $this->hasMany('App\Museum');
  }
}
