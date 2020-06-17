<!DOCTYPE html>
<head>
	<meta charset = "UTF-8">
	<title>学生サークル一覧｜サクサク</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1/slick/slick.min.css">
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1/slick/slick-theme.min.css">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1/slick/slick.min.js"></script>
  	<script type="text/javascript" src="{{ asset ('js/slick.min.js') }}"></script>
</head>

@yield('script')

<body>
	<div class="navi">
    <div class="menu-trigger" href="">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <nav>
  		<h1>
  			<a><img src="{{ asset ('images/sakusaku_logo.png') }}" alt="ロゴ"></a>
  		</h1>
      <ul>
         <li><i class="fas fa-home fa-fw fa-2x font"></i><a href="/">ホーム</a></li>
         <li><i class="fas fa-search fa-fw fa-2x font"></i><a href="/search">探す</a></li>
         <li><i class="far fa-file fa-fw fa-2x font"></i><a href="/create1">作る</a></li>
      </ul>
      <ul class="account">
		 @if(Auth::check())
         <li><i class="fas fa-user-circle fa-fw fa-2x font"></i><a>{{$user->name}}</a></li>
         <li class="id"><a>{{$user->email}}</a></li>
         <li class="logout"><a href="/edit/edit">サークル情報</a></li>
         <li class="logout"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">ログアウト</a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
         </form>
         </li>
         @else
         <li><i class="fas fa-user-circle fa-fw fa-2x font"></i><a>アカウント</a></li>
         <li class="id"><a href="/login">※ログインしていません。</a></li>
         <li class="logout"><a href="/login">ログイン</a></li>
         <li class="logout"><a href="/register">新規登録</a></li>
         @endif
      </ul>
    </nav>
    <div class="overlay"></div>
 		<div class="navigation">
       <ul>
           <li>
           	 <a href="/">
                <i class="fas fa-home fa-fw fa-2x font"></i>
                <span>ホーム</span>
             </a>
           </li>
           <li>
           		<a href="/search">
            		<i class="fas fa-search fa-fw fa-2x font"></i>
            		<span>探す</span>
           		</a>
           </li>
           <li>
           		<a href="/create1">
             		<i class="far fa-file fa-fw fa-2x font"></i>
             		<span>作る</span>
          		</a>
           </li>
       </ul>
     </div>
  	</div>
	<div id="wrap">
		@yield('contents')
	</div>
 	<footer>
     <small>&copy; 2020. SakuSaku</small>
 	</footer>
<script type="text/javascript">
$('.menu-trigger').on('click',function(){
    if($(this).hasClass('active')){
      $(this).removeClass('active');
      $('nav').removeClass('open');
      $('.overlay').removeClass('open');
    } else {
      $(this).addClass('active');
      $('nav').addClass('open');
      $('.overlay').addClass('open');
    }
  });
  $('.overlay').on('click',function(){
    if($(this).hasClass('open')){
      $(this).removeClass('open');
      $('.menu-trigger').removeClass('active');
      $('nav').removeClass('open');
    }
  });
  $('.slider').slick({
	    autoplay:true,
	    autoplaySpeed:5000,
	    dots:true,
	});
</script>
</body>