@extends('layouts.sakusaku')
@section('contents')
<div id="sc">
	  <div id="sc_title">
		<h1>サクッと編集</h1>
	</div>
	<form method="POST" action="/update/{{$circles->circle_id}}" enctype="multipart/form-data">
	@csrf
	   @if (count($errors) > 0)
   <div>
     <ul>
         @foreach ($errors->all() as $error)
             <li>※{{ $error }}</li>
         @endforeach
     </ul>
   </div>
   @endif
		<div class="search-description no-padding">
			<h2>サークル情報を編集</h2>
			<?php
// 			 	echo "<pre>";
//         var_dump($circles);
//         echo "</pre>";
//         exit();
//      ?>
		</div>
		<table class="sc_box">
			<tr>
				<th>サークル名</th>
 				<td>
 					<input name="circle_name" class="keyword_input" placeholder="サークル名を入力してください" type="text" value="{{$circles->circle_name}}">
 				</td>
			</tr>
 			<tr>
				<th>ジャンル</th>
				<td>
					<div class="search_genre">
						<ul class="selectlist">
						@foreach ($genres as $genre)
						@php
							$checked='';
							if($genre->genre_id==$circles->genre_id){
									$checked='checked="checked"';
							}
						@endphp
  						<li>
  							<input type="radio" name="genre_id" value="{{$genre->genre_id}}" {{$checked}}>
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
 						<input name="university_1" class="keyword_input" placeholder="所属大学を入力してください" type="text" value="{{$circles->university_1}}"><label>大学</label>
 					</div>
 					<div class="university">
 						<input name="university_2" class="keyword_input" placeholder="所属大学を入力してください" type="text" value="{{$circles->university_2}}"><label>大学</label>
 					</div>
 					<div class="university">
 						<input name="university_3" class="keyword_input" placeholder="所属大学を入力してください" type="text" value="{{$circles->university_3}}"><label>大学</label>
 					</div>
 					<div class="university">
 						<input name="university_4" class="keyword_input" placeholder="所属大学を入力してください" type="text" value="{{$circles->university_4}}"><label>大学</label>
 					</div>
 				</td>
			</tr>
			<tr>
				<th>こだわり</th>
				<td>
					<div class="selectlist">
					<ul>
						@foreach ($points as $point)
            @php
            	$checked='';
            	var_dump($circles->points);
            @endphp
  						<li>
  							<input type="checkbox" name="point_id" value="{{$point -> point_id}}" {{$checked}}>
  							<label>{{$point->point}}</label>
  						</li>
  					@endforeach
  				</ul>
					</div>
				</td>
			</tr>
  		<tr>
  			<th>活動場所</th>
  			<td>
  				<div class="place">
  					<input name="place_1" class="keyword_input" placeholder="活動場所を記入してください" type="text"  value="{{$circles->place_1}}" multiple>
  				</div>
  				<div class="place">
  					<input name="place_2" class="keyword_input" placeholder="活動場所を記入してください" type="text" value="{{$circles->place_2}}" multiple>
  				</div>
  				<div class="place">
  					<input name="place_3" class="keyword_input" placeholder="活動場所を記入してください" type="text" value="{{$circles->place_3}}" multiple>
  				</div>
  			</td>
  		</tr>
  		<tr>
   			<th>画像</th>
   			<td>
           <div class="view_box">
             <label>メイン</label>
             <input name="image_1" type="file" class="file" multiple>
           </div>
           <div class="view_box">
             <label>サブ１</label>
             <input name="image_2" type="file" class="file" multiple>
           </div>
           <div class="view_box">
             <label>サブ２</label>
             <input name="image_3" type="file" class="file" multiple>
           </div>
           <div class="view_box">
             <label>サブ３</label>
             <input name="image_4" type="file" class="file" multiple>
           </div>
    			</td>
     		</tr>
  		<tr>
  			<th>関連リンク</th>
    		<td>
           <ul>
           	<li class="link">
             	<label>LINE</label>
    					<input name="line" class="keyword_input" placeholder="URLを入力してください" type="text" value="{{$circles->line}}">
    				</li>
    				<li class="link">
    					<label>Twitter</label>
    					<input name="twitter" class="keyword_input" placeholder="URLを入力してください" type="text" value="{{$circles->twitter}}">
    				</li>
    				<li class="link">
    					<label>Instagram</label>
    					<input name="instagram" class="keyword_input" placeholder="URLを入力してください" type="text" value="{{$circles->instagram}}">
    				</li>
    				<li class="link">
    					<label>Facebook</label>
    					<input name="facebook" class="keyword_input" placeholder="URLを入力してください" type="text" value="{{$circles->facebook}}">
    				</li>
    				<li class="link">
    					<label>Blog</label>
    					<input name="blog" class="keyword_input" placeholder="URLを入力してください" type="text" value="{{$circles->blog}}">
           	</li>
           </ul>
    			</td>
     	</tr>
  		<tr>
  			<th>PR文</th>
  			<td>
  				<textarea name="pr_text" rows="10" cols="80" placeholder="PR文を入力してください">{{$circles->pr_text}}</textarea>
   			</td>
     	</tr>
     </table>
  	<div class="searchbox">
  		<input class="button-large" type="submit" value="登録">
  	</div>
	</form>
</div>
@endsection