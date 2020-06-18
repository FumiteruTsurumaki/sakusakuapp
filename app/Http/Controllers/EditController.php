<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Point;
use App\User;
use App\circle;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{

  public function edit(Request $request)
  {
   $points = Point::all();
   $user = Auth::user();
//    $circles = circle::find($user->id);
   $circles = circle::where('user_id', $user->id)->get();
 //      echo "<pre>";
 //      var_dump($circles);
 //      echo "</pre>";
 //      exit();
     return view('edit.edit', ['user' => $user, 'points' => $points,'circles' => $circles]);
  }

  public function update(Request $request,$circle_id) {
   $user = Auth::user();
   $circles = circle::where('circle_id', $circle_id)->first();
//    $sesdata = $request->session()->get('id');
//         echo "<pre>";
//         var_dump($circles);
//         echo "</pre>";
//         exit();
   $genre = Genre::all();
   $point =  Point::all();
   return view('edit.update', ['genres' => $genre, 'points' => $point, 'user' => $user, 'circles'=>$circles]);
  }
  public function update_post(Request $request, $circle_id) {
   $this->validate($request, circle::$rules1);
   $user = Auth::user();
   $circle = circle::where('circle_id', $circle_id)->first();
   $form = $request->all();
   unset($form['_token']);
   for ($i = 1; $i < 5; $i++) {
    $image_i = "image_$i";
    if ($request->hasFile($image_i)) {
     unset($form[$image_i]);
     $request->file($image_i)->storeAs('public',$circle_id . "_$i.jpg");
     $circle->$image_i = $circle_id . "_$i.jpg";
    }
   }

//    echo "<pre>";
//    var_dump($form);
//    echo "<pre>";
//    exit;

   $circle->fill($form)->save();
   $circles = circle::where('user_id', $user->id)->get();
   $genre = Genre::all();
   $point =  Point::all();
   return view('edit.edit',['genres' => $genre, 'points' => $point,'user' => $user, 'circles'=>$circles]);
  }

//   public function update2(Request $request ,$circle_id) {
//    $user = Auth::user();
//    $test = $this->validate($request, circle::$rules1);
//    $circles = circle::where('circle_id', $circle_id)->first();
//    return view('edit.update2',['test' => $test, 'user' => $user, 'circles'=>$circles]);
//   }
//   public function update2_post(Request $request ,$circle_id) {
//    $user = Auth::user();
//    $this->validate($request, circle::$rules2);
//    $circles = circle::where('circle_id', $circle_id)->first();
//    $circles->user_id = $request->user()->id;

//    $form = $request->all();
//    unset($form['_token']);
//    $update1_form = $request->session()->get('id');
//    for ($i = 1; $i < 5; $i++) {
//     if ($request->has("image_$i")) {
//      unset($form["image_$i"]);
//      $update1_form["image_$i"] = $user->id . "_$i.jpg";
//      $request->file("image_$i")->storeAs('public',$user->id . "_$i.jpg");
//     }
//    }

//    $form = array_merge ($update1_form, $form);
//    $circles->fill($form)->save();
//    //   echo "<pre>";
//    //   var_dump($form);
//    //   echo "<pre>";
//    //   exit;
//    $points = Point::all();
//    $items = circle::all();
//    return view('edit.edit',['points' => $points, 'items' => $items, 'user' => $user, 'circles'=>$circles]);
//   }

  public function delete($circle_id)
  {
   circle::where('circle_id', $circle_id)->delete();

   return redirect()->to('edit/edit');
  }

}
