<?php

namespace App\Http\Controllers;

use App\circle;
use App\Point;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{

  public function detail($circle_id) {
    $user = Auth::user();
    $points = Point::all();
    $item = circle::select()->where('circle_id', $circle_id)->first();

    return view('detail.detail',['user' => $user, 'points' => $points, 'item' => $item]);
  }

}