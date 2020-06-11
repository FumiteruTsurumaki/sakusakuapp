<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\circle;
use App\Number;
use App\Genre;
use App\Point;

class SearchController extends Controller
{
 public function search(Request $request) {
  $user = Auth::user();
  $number = Number::all();
  $genre = Genre::all();
  $point = Point::all();
  return view('search.search',['number' => $number, 'genre' => $genre, 'point' => $point,'user' => $user]);
 }
 public function search_post(Request $request)
 {
  $points = Point::all();
  $user = Auth::user();
  $form = $request->all();
  unset($form['_token']);
  $genre = (array_key_exists('genre' , $form)) ? $form['genre'] : false;
  $point = (array_key_exists('point' , $form)) ? $form['point'] : false;

  $items = circle::universityEqual($form['keyword_input'])
  ->Number($form['select_number'])
  ->Genre($genre)
  ->Point($point)
  ->get();
//   $points = implode( ",", $point );
//   echo "<pre>";
//   var_dump($items);
//   echo "</pre>";
//   exit();
  return view('lists.lists', ['input' => $request->input, 'items' => $items,'user' => $user, 'points' => $points]);
 }
}
