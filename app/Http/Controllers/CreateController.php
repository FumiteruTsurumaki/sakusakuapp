<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use App\Genre;
use App\Point;
use App\circle;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{

  public function create1(Request $request) {
    $user = Auth::user();
    $genre = Genre::all();
    $point =  Point::all();
    $sesdata = $request->session()->get('id');

    if ( Auth::check() ) {
     return view('create.create1', ['user' => $user, 'genres' => $genre, 'points' => $point, 'sesdata' => $sesdata]);
    } else {
     return view('auth.login');
    }
  }

  public function create1_post(HelloRequest $request) {
    $user = Auth::user();
    $this->validate($request, circle::$rules1);

    $form = $request->all();
    unset($form['_token']);
    $request->session()->put('id', $form);

    return view('create.create2',['user' => $user]);
  }


  public function create2(Request $request) {
    $user = Auth::user();
    $test = $this->validate($request, circle::$rules1);

    return view('create.create2',['user' => $user, 'test' => $test]);
  }

  public function create2_post(Request $request) {
    $user = Auth::user();
    $points = Point::all();
    $items = circle::all();
    $this->validate($request, circle::$rules2);

    $circle = new circle;
    $circle->user_id = $request->user()->id;

    $form = $request->all();
    unset($form['_token']);
    $create1_form = $request->session()->get('id');
    for ($i = 1; $i < 5; $i++) {
      if ($request->has("image_$i")) {
        unset($form["image_$i"]);
        $create1_form["image_$i"] = $user->id . "_$i.jpg";
        $request->file("image_$i")->storeAs('public',$user->id . "_$i.jpg");
      }
    }
    $form = array_merge ($create1_form, $form);
    $circle->fill($form)->save();

    return view('top.index',['user' => $user, 'points' => $points, 'items' => $items]);
  }

}