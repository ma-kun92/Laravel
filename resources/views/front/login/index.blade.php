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
{{-- <link rel="stylesheet" href="css/add.css"> --}}
<script src="js/jquery-3.4.0.min.js"></script>
<script type="text/javascript" src="/js/openclose.js"></script>
<script type="text/javascript" src="/js/def.js"></script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="s-n">

  <div class="inner">
    <header>
      <div class="inner">
        <h1 id="logo"><a href="{{ url('/') }}"><img src="/images/logo.png" alt="Sample Company"></a></h1>
      </div>
    </header>

    <!--PC用（801px以上端末）メニュー-->
    <nav id="menubar">
      <ul class="inner">
        <li><a href="{{ url('/') }}"><span>Home</span>ホーム</a></li>
        <li><a href="{{ url('/register/index') }}"><span>Register</span>会員登録</a></li>
        <li class="current"><a href="/login/index"><span>Contact</span>ログイン</a></li>
      </ul>
    </nav>

    <!--小さな端末用（800px以下端末）メニュー-->
    <nav id="menubar-s">
      <ul>
        <li><a href="{{ url('/') }}">ホーム</a></li>
        <li><a href="company.html">会社概要</a></li>
        <li><a href="service.html">サービス案内</a></li>
        <li><a href="recruit.html">採用情報</a></li>
        <li><a href="link.html">リンク</a></li>
        <li><a href="{{ url('/register/index') }}">会員登録</a></li>
        <li><a href="contact.html">コンタクト</a></li>
      </ul>
    </nav>
  </div>

  <div class="contents">
    <div class="inner">

      <div class="main">

        <section>

          <h2>ログイン画面<span>Contact</span></h2>

          <form name="form1" enctype="multipart/form-data" method="post" action="{{ url('/login/check') }}">
            @csrf
            <table class="">
                
              <tr>
                <th width="150">メールアドレス<span class="red bold">※</span></th>
                <td>
                <input name="email" id="email" value="" type="text" maxlength="32" class="" placeholder="メールアドレス">
                </td>
              </tr>
              <tr>
                <th>パスワード<span class="red bold">※</span></th>
                <td>
                <input name="passwd" id="passwd" value="" type="passward" maxlength="16" class="" placeholder="パスワード">
                </td>                      
              </tr>
              
            </table>
            <div class="c">
              <input type="submit" value="ログイン">
              &nbsp;
              <input type="reset" value="リセット">
            </div>
          </form>

        </section>

      </div>

      <div class="sub">

        <nav class="box1">
        <h2>Menu</h2>
          <ul class="submenu">
            <li><a href="{{ url('/') }}">ホーム</a></li>
            <li><a href="{{ url('/register/index') }}">会員登録</a></li>
            <li><a href="{{ url('/login/index') }}">ログイン</a></li>
          </ul>
        </nav>

        <div class="box1">
          <h2>この見出しはh2タグです</h2>
          <p>このボックスは、class="box1"と指定すれば出ます。</p>
        </div>

        <h2>Access</h2>
          <div class="box1">
          <strong>TEL:00-0000-0000</strong><br>
          <span class="mini1">受付：00:00〜00:00<br>
          定休日：水曜日</span>
        </div>

      </div>
      <!--/sub-->

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
        <li><a href="#">メニューサンプル</a></li>
      </ul>
      <ul>
        <li><a href="#">メニューサンプル</a></li>
        <li><a href="#">メニューサンプル</a></li>
        <li><a href="#">メニューサンプル</a></li>
      </ul>
      <ul>
        <li><a href="#">メニューサンプル</a></li>
        <li><a href="#">メニューサンプル</a></li>
        <li><a href="#">メニューサンプル</a></li>
      </ul>
      <ul>
        <li><a href="#">メニューサンプル</a></li>
        <li><a href="#">メニューサンプル</a></li>
        <li><a href="#">メニューサンプル</a></li>
      </ul>
      <ul>
        <li><a href="#">メニューサンプル</a></li>
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
