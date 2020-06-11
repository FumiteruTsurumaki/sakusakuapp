<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\circle;
use App\Point;

class ListsController extends Controller
{
 function lists() {
  $points = Point::all();
  $items = circle::all();
  return view('lists.lists',['points' => $points, 'items' => $items,]);
 }
}