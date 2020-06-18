<?php

namespace App\Http\Controllers;

use App\circle;
use App\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{

  public function index(Request $request) {
     $user = Auth::user();
     $points = Point::all();
     $items = circle::all();

     return view('top.index',['user' => $user, 'points' => $points, 'items' => $items]);
  }

}
