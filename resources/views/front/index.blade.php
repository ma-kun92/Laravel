<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>システム構築学習用</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="ここにサイト説明を入れます">
<meta name="keywords" content="キーワード１,キーワード２,キーワード３,キーワード４,キーワード５">
<link rel="stylesheet" href="/css/style.css">
<script type="text/javascript" src="/js/openclose.js"></script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body id="top">

  <div id="topcontents">
    <div class="inner">

      <header>
        <div class="inner">
          <h1 id="logo"><a href="{{ url('/') }}"><img src="images/logo.png" alt="Sample Company"></a></h1>
        </div>
      </header>
      @if (session('message'))
      <div class="alert alert-success">
        {{ session('message') }}
      </div>
      @endif
      <!--トップページ専用メニュー-->
      <nav id="menubar-top">
        <ul class="inner">
          @if (admin_user())
          <li><a href="{{ action('TopController@index') }}"><span>Home</span>ホーム</a></li>
          <li><a href="{{ action('TopController@index') }}"><span>Company</span>会社概要</a></li>
          <li><a href="{{ action('SliderController@index') }}"><span>Service</span>CMS:スライダー</a></li>
          <li><a href="{{ action('TopController@index') }}"><span>Recruit</span>採用情報</a></li>
          <li><a href="{{ action('TopController@index') }}"><span>Link</span>リンク</a></li>
          <li><a href="{{ action('ContactController@index') }}"><span>Contact</span>コンタクト</a></li>
          <li><a href="{{ action('LoginController@logout') }}"><span>Logout</span>ログアウト</a></li>
          @else
          <li><a href="{{ action('RegisterController@index') }}"><span>Register</span>会員登録</a></li>
          <li><a href="{{ action('LoginController@index') }}"><span>Login</span>ログイン</a></li>
          @endif
        </ul>
      </nav>

    </div>
    <!--/inner-->
  </div>
  <!--/topcontents-->

  <div class="contents bg1">
    <div class="inner">
      <section id="new">
      <h2 id="newinfo_hdr" class="close">更新情報・お知らせ<span>What's New</span></h2>
      <dl id="newinfo">
        <dt>2017/08/26</dt>
        <dd>tp_biz47公開。<span class="newicon">NEW</span></dd>
        <dt>20XX/00/00</dt>
        <dd>サンプルテキスト。サンプルテキスト。サンプルテキスト。</dd>
        <dt>20XX/00/00</dt>
        <dd>サンプルテキスト。サンプルテキスト。サンプルテキスト。</dd>
        <dt>20XX/00/00</dt>
        <dd>サンプルテキスト。サンプルテキスト。サンプルテキスト。</dd>
        <dt>20XX/00/00</dt>
        <dd>サンプルテキスト。サンプルテキスト。サンプルテキスト。</dd>
        <dt>20XX/00/00</dt>
        <dd>サンプルテキスト。サンプルテキスト。サンプルテキスト。</dd>
        <dt>20XX/00/00</dt>
        <dd>サンプルテキスト。サンプルテキスト。サンプルテキスト。</dd>
      </dl>
      </section>

    </div>
    <!--/inner-->
  </div>
  <!--/contents-->

  <p id="pagetop" class="inner"><a href="#">↑</a></p>

  <footer>

    <div id="footermenu" class="inner">
      <ul>
        <li><a href="#">メニューサンプル</a></li>
        <li><a href="#">メニューサンプル</a></li>
      </ul>
      <ul>
        <li><a href="#">メニューサンプル</a></li>
        <li><a href="#">メニューサンプル</a></li>
      </ul>
      <ul>
        <li><a href="#">メニューサンプル</a></li>
        <li><a href="#">メニューサンプル</a></li>
      </ul>
      <ul>
        <li><a href="#">メニューサンプル</a></li>
        <li><a href="#">メニューサンプル</a></li>
      </ul>
      <ul>
        <li><a href="#">メニューサンプル</a></li>
      </ul>
    </div>
    <!--footermenu-->

    <div id="copyright">
      <small>Copyright&copy; <a href="{{ url('/') }}">SAMPLE COMPANY</a> All Rights Reserved.</small>
      <span class="pr"><a href="http://template-party.com/" target="_blank">《Web Design:Template-Party》</a></span>
    </div>

  </footer>

  <!--スマホ用更新情報　800px以下-->
  <script type="text/javascript">
  if (OCwindowWidth() <= 800) {
  	open_close("newinfo_hdr", "newinfo");
  }
  </script>

  <!--メニューの３本バー-->
  <div id="menubar_hdr" class="close"><span></span><span></span><span></span></div>
  <!--メニューの開閉処理条件設定　800px以下-->
  <script type="text/javascript">
  if (OCwindowWidth() <= 800) {
  	open_close("menubar_hdr", "menubar-s");
  }
  </script>
</body>
</html>
