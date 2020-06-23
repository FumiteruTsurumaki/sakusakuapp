@extends('layouts.sakusaku')
@section('contents')
<div id="sc">
	<div id="sc_title">
		<h1>サクッと探す</h1>
	</div>
	<div class="sc_description">
		<h2>お探しの条件を入力してください（一部複数選択OK）</h2>
	</div>
	<form method="POST" action="/search">
	@csrf
	<table class="sc_box">
		<tr>
			<th>大学名で探す</th>
 				<td>
 					<div class="university">
 						<input name="keyword_input" class="keyword_input" placeholder="大学名を入力してください" type="text"><label>大学</label>
					</div>
 				</td>
		</tr>
		<tr>
			<th>ジャンルで探す</th>
			<td>
				<div class="search_genre">
 					<ul class="selectlist">
 						@foreach ($genre as $gen)
 						<li>
 							<input type="checkbox" name="genre[]" value="{{$gen -> genre_id}}">
 							<label>{{$gen -> genre_name}}</label>
 						</li>
 						@endforeach
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<th>こだわりで探す</th>
			<td>
				<div class="selectlist">
					<ul>
						@foreach ($point as $poi)
  						<li>
  							<input type="checkbox" name="point[]" value="{{$poi -> point_id}}">
  							<label>{{$poi -> point}}</label>
  						</li>
 						@endforeach
 					</ul>
				</div>
			</td>
		</tr>
	</table>
	<div class="searchbox">
		<input class="button-large" type="submit" value="この条件で探す">
	</div>
	</form>
</div>
@endsection