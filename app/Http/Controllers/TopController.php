<?php

namespace App\Http\Controllers;

use App\circle;
use App\Point;
use App\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{
 public function index(Request $request) {
   $user = Auth::user();
   $points = Point::all();
   $items = circle::all();
//    echo "<pre>";
//    var_dump($items);
//    echo "</pre>";
//    exit();
   return view('top.index',['points' => $points, 'items' => $items,'user' => $user]);
  }
  public function index_post(Request $request) {
     $items  = circle::all();
     $points = Point::all();
     //    echo "<pre>";
     //    var_dump($points);
     //    echo "</pre>";
     //    exit();
     return view('top.index',['items' => $items, 'points' => $points]);
  }
}
