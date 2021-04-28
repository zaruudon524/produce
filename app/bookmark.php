<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bookmark extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'museum_id' => 'required',
        'title' => 'required',
        );
    
    public function museum()
    {
        return $this->belongTo('App\Museum');
    
    public function getData()
    {
        return $this->id . ': ' . $this->title . ' ('
           . $this->museum->name . ')';
    }
}
