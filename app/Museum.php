<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Scope;

class Museum extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
    'name',
    'place',
    'body',
    'address',
    'time',
    'day',
    'money',
    'traffic',
    'sns',
    'tel',
    'homepage',
    'other',
];
    
    public function getPaginateByLimit(int $limit_count=3)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
        $user = App\User::find(userId);
    }
    
     public function review()
    {
        return $this->belongsTo('App\Review');
    }
    
    // public function tags()
    // {
    //     return $this->belongsToMany('App\Tag', museum_tags);
    // }
    
    public static function Search($search)
    {
        return self::where('name', 'like', '%' . $search . '%')
            ->orwhere('place',  'like', '%' . $search . '%')
            ->orwhere('body',  'like', '%' . $search . '%');
    }
    
    
    // public static function prefecture($prefecture)
    // {
    //     return self::where('place', 'like', '%' . $prefecture . '%');
    // }
    
    // public static function museumkind($museumkind)
    // {
    //     return self::where('body', 'like', '%' . $museumkind . '%');
    // }
    
    // public static function museumname($museumname)
    // {
    //     return self::where('name', 'like', '%' . $museumname . '%');
    // }
     
     public function reviews()
    {
        return $this->hasMany('App\Review');
    }
  
}

    