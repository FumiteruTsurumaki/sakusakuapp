@extends('layouts.sakusaku')
@section('contents')
<div id="detail">
	<div id="detail_in">
    <div id="detail_title">
    	<h1>{{$item->circle_name}}</h1>
    </div>
    <ul class="slider">
    @isset ($item->image_1)
    	<li><a href="#"><img src="{{ asset("/storage/$item->image_1") }}" alt=""></a></li>
    @else
   		<li><a href="#"><img src="{{ asset ('images/noimage.png') }}" alt="画像がありません"></a></li>
    @endisset
    @isset ($item->image_1)
    	<li><a href="#"><img src="{{ asset("/storage/$item->image_2") }}" alt=""></a></li>
    @else
   		<li><a href="#"><img src="{{ asset ('images/noimage.png') }}" alt="画像がありません"></a></li>
    @endisset
    @isset ($item->image_1)
    	<li><a href="#"><img src="{{ asset("/storage/$item->image_3") }}" alt=""></a></li>
    @else
   		<li><a href="#"><img src="{{ asset ('images/noimage.png') }}" alt="画像がありません"></a></li>
    @endisset
    @isset ($item->image_1)
    	<li><a href="#"><img src="{{ asset("/storage/$item->image_4") }}" alt=""></a></li>
    @else
   		<li><a href="#"><img src="{{ asset ('images/noimage.png') }}" alt="画像がありません"></a></li>
    @endisset
    </ul>
		<p id="pr_title">
			<span>ABOUT</span>
		</p>
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
  	<div id="pr">
  		<p>{{$item->pr_text}}</p>
  	</div>
  	<dl id="about">
  		<dt>所属人数</dt>
  		<dd>{{$item->number}}</dd>
  		<dt>設立年</dt>
  		<dd>{{$item->create_year}}</dd>
  		<dt>活動場所</dt>
  		<dd>
  		  <ul>
 					<li><a>{{$item->place_1}}</a></li>
 					<li><a>{{$item->place_2}}</a></li>
 					<li><a>{{$item->place_3}}</a></li>
  			</ul>
  		</dd>
  		<dt>関連リンク</dt>
  		<dd>
  			<ul>
 					<li>LINE:<a href="{{$item->line}}">{{$item->line}}</a></li>
 					<li>Twitter:<a href="{{$item->twitter}}">{{$item->twitter}}</a></li>
 					<li>Instagram:<a href="{{$item->instagram}}">{{$item->instagram}}</a></li>
 					<li>Facebook:<a href="{{$item->facebook}}">{{$item->facebook}}</a></li>
  			</ul>
  		</dd>
  	</dl>
	</div>
</div>
@endsection