@extends('layouts.sakusaku')
@section('contents')
 	<div id="sc">
 		<div id="sc_title">
		<h1>サクッと作る</h1>
	</div>
	<div class="sc_description">
		<h2>詳細情報を入力しよう</h2>
	</div>
	<form method="POST" action="/create2" enctype="multipart/form-data">
	@csrf
	<table class="sc_box">
		<tr>
			<th>活動場所</th>
			<td>
				<div class="place">
					<input name="place_1" class="keyword_input" placeholder="活動場所を記入してください" type="text" multiple>
				</div>
				<div class="place">
					<input name="place_2" class="keyword_input" placeholder="活動場所を記入してください" type="text" multiple>
				</div>
				<div class="place">
					<input name="place_3" class="keyword_input" placeholder="活動場所を記入してください" type="text" multiple>
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
  				<input name="line" class="keyword_input" placeholder="URLを入力してください" type="text">
  			</li>
  			<li class="link">
  				<label>Twitter</label>
  				<input name="twitter" class="keyword_input" placeholder="URLを入力してください" type="text">
  			</li>
  			<li class="link">
  				<label>Instagram</label>
  				<input name="instagram" class="keyword_input" placeholder="URLを入力してください" type="text">
  			</li>
  			<li class="link">
  				<label>Facebook</label>
  				<input name="facebook" class="keyword_input" placeholder="URLを入力してください" type="text">
  			</li>
  			<li class="link">
  				<label>Blog</label>
  				<input name="blog" class="keyword_input" placeholder="URLを入力してください" type="text">
        	</li>
        </ul>
  		</td>
   	</tr>
		<tr>
			<th>PR文</th>
			<td>
				<textarea name="pr_text" rows="10" cols="80" placeholder="PR文を入力してください"></textarea>
 			</td>
   	</tr>
   </table>
  	<div class="searchbox">
  		<input class="button-large" type="submit" value="登録">
  	</div>
  </form>
</div>
@endsection