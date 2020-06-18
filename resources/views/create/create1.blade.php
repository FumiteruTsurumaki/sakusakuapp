@extends('layouts.sakusaku')
@section('contents')
<div id="sc">
	<div id="sc_title">
		<h1>サクッと作る</h1>
	</div>
	<form method="POST" action="/create1">
	@csrf
	@if (count($errors) > 0)
  <div>
    <ul>
      @foreach ($errors->all() as $error)
      		<li class="error">※{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
	<div class="sc_description">
		<h2>あなたの作りたいサークル情報を入力しよう</h2>
	</div>
	<table class="sc_box">
		<tr>
			<th>サークル名</th>
			<td>
				<input name="circle_name" class="keyword_input" placeholder="サークル名を入力してください" type="text" value="{{old('circle_name')}}">
			</td>
		</tr>
		<tr>
			<th>ジャンル</th>
			<td>
				<div class="search_genre">
					<ul class="selectlist">
					@foreach ($genres as $genre)
					<li>
						<input type="radio" name="genre_id" value="{{$genre->genre_id}}">
						<label>{{$genre->genre_name}}</label>
					</li>
					@endforeach
 					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<th>所属大学</th>
			<td>
				<div class="university">
					<input name="university_1" class="keyword_input" placeholder="所属大学を入力してください" type="text" value="{{old('university_1')}}"><label>大学</label>
				</div>
				<div class="university">
					<input name="university_2" class="keyword_input" placeholder="所属大学を入力してください" type="text" value="{{old('university_2')}}"><label>大学</label>
				</div>
				<div class="university">
					<input name="university_3" class="keyword_input" placeholder="所属大学を入力してください" type="text" value="{{old('university_3')}}"><label>大学</label>
				</div>
				<div class="university">
					<input name="university_4" class="keyword_input" placeholder="所属大学を入力してください" type="text" value="{{old('university_4')}}"><label>大学</label>
				</div>
			</td>
		</tr>
		<tr>
			<th>こだわり</th>
			<td>
				<div class="selectlist">
				<ul>
					@foreach ($points as $point)
 						<li>
 							<input type="checkbox" name="point" value="{{$point -> point_id}}">
 							<label>{{$point->point}}</label>
 						</li>
 					@endforeach
 				</ul>
				</div>
			</td>
		</tr>
	</table>
	<div class="searchbox">
		<input class="button-large" type="submit" value="次へ">
	</div>
	</form>
</div>
@endsection