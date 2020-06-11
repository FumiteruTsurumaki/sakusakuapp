<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class circle extends Model
{
    //
  protected $primaryKey = 'circle_id';
  protected $table = 'm_circle';
  protected $fillable = [//ホワイトリスト
   'mail',
   'password',
   'circle_name',
   'genre_id',
   'number',
   'create_year',
   'pr_text',
   'university_1',
   'university_2',
   'university_3',
   'university_4',
   'point',
   'image_1',
   'image_2',
   'image_3',
   'image_4',
   'place_1',
   'place_2',
   'place_3',
   'line',
   'twitter',
   'instagram',
   'facebook',
   'blog',
  ];
  public $timestamps = false;
  public static $rules1 = array(
//    'mail' => 'email',
//    'password' => 'required',
   'circle_name' => 'required',
   'genre_id' => 'required',
   'university_1' => 'required',
//    'university_2' => 'required',
//    'university_3' => 'required',
//    'university_4' => 'required',
//    'point_id' => 'accept',
  );
  public static $rules2 = array(
  //    'place_1' => 'required',
  //    'place_2' => 'required',
  //    'place_3' => 'required',
//      'scale' => 'required',
//      'image_1' => 'required',
  //    'image_2' => 'required’',
  //    'image_3' => 'required',
  //    'image_4' => 'required',
  //    'line' => 'url',
  //    'twitter' => 'url',
  //    'instagram' => 'url',
  //    'facebook' => 'url',
//   //    'blog' => 'url',
//      'pr_text' => 'required',
  );

  public function genre()
  {
   return $this->hasOne('App\Genre','genre_id','genre_id');
  }

  public function scopeUniversityEqual($query, $str)
  {
   if(is_null($str) || $str == "" ){
    return;
   }
   return
   $query->where('university_1', $str)
   ->orWhere('university_2', $str)
   ->orWhere('university_3', $str)
   ->orWhere('university_4', $str);
  }
  public function scopeNumber($query, $str)
  {
   if(is_null($str) || $str == "" ){
    return;
   }
   return
   $query->where('number', $str);
  }
  public function scopeGenre($query, $array)
  {
   if (!$array) {
    return;
   }
   return $query->whereIn('genre_id', $array);
  }

  public function scopePoint($query, $points)
  {
   if ($points) {

    foreach ($points as $point) {
     if ($point === reset($points)) {
      $query->whereRaw("FIND_IN_SET('$point' ,point)");
     }else {
      $query->orWhereRaw("FIND_IN_SET('$point' ,point)");
     }

    }
    $res = $query;
    return $res;

   }
   return;

  }

  public function user()
  {
   return $this->belongsTo('App\User');
  }
}