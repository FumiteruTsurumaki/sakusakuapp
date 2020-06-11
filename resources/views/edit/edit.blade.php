@extends('layouts.sakusaku')
@section('script')
  <script>
  $(function(){
  $(".btn-dell").click(function(){
  if(confirm("本当に削除しますか？")){
  //そのままsubmit（削除）
  }else{
  //cancel
  return false;
  }
  });
  });
  </script>
@endsection
@section('contents')
  <div id="lists">
  	<h1>{{ $user->name }}さんのサークル一覧</h1>
  	<ul id="lists_in">
@foreach ($circles as $circle)
			<li id="list">
  			<figure>
  				@isset ($circle->image_1)
  				<a href="/detail"><img src="{{ asset("/storage/$circle->image_1") }}" alt="サークル画像"></a>
  				@else
  				<a href="/detail"><img src="{{ asset ('images/noimage.png') }}" alt="画像がありません"></a>
  				@endisset
  			</figure>
				<a class="name" href="/detail/{{$circle->circle_id}}">{{$circle->circle_name}}</a>
				<div class="list-genre">
  				<i class="fas fa-user-friends fa-fw">
  				</i>
  				  <p>
  				  	{{$circle->genre->genre_name}}
  					</p>
  			</div>
  			<div class="list-school">
  				<label><i class="fas fa-school fa-fw"></i></label>
  					<ul>
  						<li>{{$circle->university_1}}</li>
  						<li>{{$circle->university_2}}</li>
  						<li>{{$circle->university_3}}</li>
  						<li>{{$circle->university_4}}</li>
  					</ul>
  			</div>
 				<ul class="points">
   				@php
   				$point = explode ("," , $circle->point);
   				@endphp<br>
   				@foreach($points as $val)
   				@if(in_array($val->point_id, $point))
   				<li>
    					<p>{{$val->point}}</p>
    				</li>
    				@endif
    				@endforeach
   			</ul>
   			<div class="edit">
     			<a href="/update/{{$circle->circle_id}}">編集|</a>
     			<form action="/delete/{{$circle->circle_id}}" method="POST">
              @csrf
              @method('DELETE')
              <input type="submit" name="" value="削除" class="btn-dell">
          </form>
        </div>
			</li>
@endforeach
		</ul>
	</div>
@endsection