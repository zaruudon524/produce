<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\DB;

class Museum extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
    'name',
    'place_id',
    'body_id',
    'address',
    'time',
    'day',
    'money',
    'traffic',
    'sns',
    'tel',
    'homepage',
    'other'
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
    
    public function prefs()
    {
        return $this->hasMany('App\Pref','place_id');
    }
    
    public function museumkinds()
    {
        return $this->hasMany('App\Museumkind','body_id');
    }
    
    public static function Search($search)
    {
        return self::where('name', 'like', '%' . $search . '%')
            ->orwhere('place',  'like', '%' . $search . '%')
            ->orwhere('body',  'like', '%' . $search . '%');
    }
    
    // public static function Place($place)
    // {
    //     // $place = DB::table('museums')
    //     //   ->join('prefs','museums.place_id','=','prefs.place_id')
    //     //   ->get();
    //     return self::where('place', 'like', $place);
    // }
    
    // public static function Body($body)
    // {
    //     return self::where('body', 'like', $body);
    // }
    
    public function getPlaceNameAttribute()
      {
          return Pref::where('place_id', $this->place)->first();
      }
    
    public function getBodyNameAttribute()
      {
          return Museumkind::where('body_id', $this->body)->first();
      }
    
    
    // public function getPlaceNameAttribute()
    //   {
    //       return config('place.'.$this->place_id);
    //   }
        
    //  public function getBodyNameAttribute()
    //   {
    //       return config('body.'.$this->body_id);
    //   }
    
    
    public static function boot()
    {
        parent::boot();

        static::deleted(function ($museum) {
            $museum->reviews()->delete();
        });
    }
     
     public function reviews()
    {
        return $this->hasMany('App\Review');
    }
  
}

    