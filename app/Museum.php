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
    
    public function getPaginateByLimit(int $limit_count=10)
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
    
    public static function scopeSearch($search)
    {
        return self::where('name', 'like', '%' . $search . '%')
            ->orwhere('place',  'like', '%' . $search . '%')
            ->orwhere('body',  'like', '%' . $search . '%');
            
        // return $->where(function($query) use ($search){
        //     $query->where('name', 'like', '%' . $search . '%')
        //     ->orwhere('place',  'like', '%' . $search . '%')
        //     ->orwhere('body',  'like', '%' . $search . '%');
    // });
       
   
     }
     
     public function reviews()
    {
        return $this->hasMany('App\Review');
    }
  
}

    