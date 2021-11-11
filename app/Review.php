<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Museum;

class Review extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
    'title',
    'body',
    'museum_id',
    'user_id'
];


public function museum()
  {
    $museums = App\Review::find(museum_id)->museums();
    return $this->belongsTo('App\Museum');
  }
  
  public function users()
  {
    $reviews=App\User::find(review_id)->reviews();
    return $this->belongsTo('App\User');
  }
  
}
