@extends('layouts.sakusaku')
@section('contents')
  <div id="main_img">
 		<div id="main-msg">
 			<h1>一生の仲間を作ろう</h1>
 			<h2>サークルを作って探せる</h2>
   		<div id="main_but">
   			<div class="create-but"><a href="/create1">サクッと作る</a></div>
   			<div class="search-but"><a href="/search">サクッと探す</a></div>
   		</div>
    </div>
  </div>
  <div id="lists">
  	<h1>新着サークル一覧</h1>
  	<ul id="lists_in">
		@foreach ($items as $item)
			<li id="list">
  			<figure>
  				@isset ($item->image_1)
  					<a href="/detail"><img src="{{ asset("/storage/app/public/$item->image_1") }}" alt="サークル画像"></a>
  				@else
  					<a href="/detail"><img src="{{ asset ('images/noimage.png') }}" alt="画像がありません"></a>
  				@endisset
  			</figure>
				<a class="name" href="/detail/{{$item->circle_id}}">{{$item->circle_name}}</a>
				<div class="list-genre">
  				<i class="fas fa-user-friends fa-fw">
  				</i>
  				  <p>
             {{$item->genre->genre_name}}
  					</p>
  			</div>
  			<div class="list-school">
  				<label><i class="fas fa-school fa-fw"></i></label>
  					<ul>
  						<li>{{$item->university_1}}</li>
  						<li>{{$item->university_2}}</li>
  						<li>{{$item->university_3}}</li>
  						<li>{{$item->university_4}}</li>
  					</ul>
  			</div>
 				<ul class="points">
   				@php
   					$point = explode ("," , $item->point);
   				@endphp<br>
   				@foreach($points as $val)
     				@if(in_array($val->point_id, $point))
       				<li>
        				<p>{{$val->point}}</p>
        			</li>
     				@endif
   				@endforeach
   			</ul>
			</li>
		@endforeach
		</ul>
	</div>
@endsection