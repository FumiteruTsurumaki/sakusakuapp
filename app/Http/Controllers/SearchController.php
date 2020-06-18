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

  public function search() {
    $user = Auth::user();
    $number = Number::all();
    $genre = Genre::all();
    $point = Point::all();

    return view('search.search',['user' => $user, 'number' => $number, 'genre' => $genre, 'point' => $point]);
  }

  public function search_post(Request $request)
  {
    $user = Auth::user();
    $points = Point::all();

    $form = $request->all();
    unset($form['_token']);

    $genre = (array_key_exists('genre' , $form)) ? $form['genre'] : false;
    $point = (array_key_exists('point' , $form)) ? $form['point'] : false;

    $items = circle::universityEqual($form['keyword_input'])
    ->Number($form['select_number'])
    ->Genre($genre)
    ->Point($point)
    ->get();

    return view('lists.lists', ['user' => $user, 'points' => $points, 'input' => $request->input, 'items' => $items]);
  }

}
