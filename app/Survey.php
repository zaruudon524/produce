<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Survey extends Model
{
    protected $fillable = [
    'living', 
    'livingplace',
    'gender',
    'age',
    'havecome',
    'reasoncoming',
    'transportation',
    'howknow',
    'comeagain',
    'comeagainform',
    'image',
    'reasonnotcoming',
    'reasonnotcomingform',
    'option',
    'museum_id'
];

    public function museum()
        {
            return $this->hasMany('App\Museum');
        }
}
