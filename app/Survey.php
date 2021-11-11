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

    // static $living = [
    //     // ['place_id' => 1, 'name' => '北海道'],
    //     ['id' => '1', 'name' => '県内'], 
    //     ['id' => '2', 'name' => '県外'], 
        
    // ];
    
    // static $livingplace = [
        
    // ];
    
    // static $gender = [
    //     '男性', '女性', 'その他', '回答しない'
    // ];
    
    // static $age = [
    //     '1, 10歳代', '2, 20歳代', '3, 30歳代', '4, 40歳代', '50歳代', '60歳代', '70歳代以上'
    // ];
    
    // static $havecome = [
    //     '１, 知っていて、来館したことがある。', '2, 知っていて、来館したことがない。', '3, 知らなかった。'
    // ];
    
    // static $reasoncoming = [
    //     '1, 見たい展示（常設展）があったから。', '2, 見たい展示（特別展）があったから。', '3, 入場券（または優待券）を入手したから。', '4, 講演会・講座・シンポジウムの聴講', '5, 調べもの', '6, その他'
    // ];
    
    // static $transportation = [
    //     '1, 自動車', '2, 電車', '3, バス', '4, 自転車・徒歩', '5, タクシー ', 'その他'
    // ];
    
    // static $howknow = [
    //     '1, 博物館のHP', '2, 広報誌', '3, チラシ・ポスター', '4, 知人等から聞いた','5, その他'
    // ];
    
    // static $comeagain = [
    //     '1, 利用したい', '2, 利用したくない', '3, どちらでもない'
    // ];
    
    // static $comeagainform = [
        
    // ];
    
    // static $image = [
    //     
    // ];
    
    // static $reasonnotcoming = [
    //     '1, アクセスが悪い。', '2, 入館料が高い。', '3, 駐車場がない。', '4, バリアフリーではない。', '5, 知らなかった', '6, その他'
    // ];
    
    // static $reasonnotcomingform = [
    //     
    // ];
    
    // static $option = [
    //     
    // ];
}
