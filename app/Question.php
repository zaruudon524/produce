<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{
    protected $fillable = [
    'radioGrp01',
    // 'survey2', 
    // 'survey3',
    // 'survey4',
    // 'survey5',
    // 'survey6',
    // 'survey7',
    // 'survey8'
];

public function museums()
    {
        return $this->hasMany('App\Museum');
    }


}
