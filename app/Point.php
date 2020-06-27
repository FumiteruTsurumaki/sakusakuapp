<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    //
 protected $primaryKey = 'point_id';
 protected $table = 'm_point';


 public function circle_point()
 {
  return $this->hasMany('App\Circle_Point');
 }
}
