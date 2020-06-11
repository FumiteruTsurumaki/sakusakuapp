<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\circle;
use App\Point;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{

  public function detail($circle_id) {
   $user = Auth::user();
   $points = Point::all();
   $item = circle::select()->where('circle_id', $circle_id)->first();
//          echo "<pre>";
//          var_dump($items);
//          echo "</pre>";
//          exit();
   return view('detail.detail',['item' => $item, 'user' => $user, 'points' => $points]);
  }

  public function detail_post(Request $request, $circle_id) {
    $items = circle::find($circle_id);
  //   echo "<pre>";
  //   var_dump($items);
  //   echo "</pre>";
  //   exit();
    return view('detail.detail',['items' => $items]);
 }
}