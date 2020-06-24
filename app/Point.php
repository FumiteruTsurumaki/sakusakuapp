<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    //
 protected $primaryKey = 'point_id';
 protected $table = 'm_point';

 public function genre ()
 {
  return $this->belongsTo('App\Genre');
 }
 public function getData()
 {
  return $this->genre->genre_name;
 }
}
