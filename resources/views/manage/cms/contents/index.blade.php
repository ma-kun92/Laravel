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
{{-- <link rel="stylesheet" href="/css/add.css"> --}}
<script src="/js/jquery-3.4.0.min.js"></script>
<script type="text/javascript" src="/js/openclose.js"></script>
<script type="text/javascript" src="/js/def.js"></script>
<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
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
        @if (admin_user())
        <li><a href="{{ action('Manage\TopController@index') }}"><span>Home</span>ホーム</a></li>
        <li><a href="{{ action('Manage\RegisterController@index') }}"><span>Company</span>一括会員登録</a></li>
        @else
        <li><a href="{{ action('RegisterController@index') }}"><span>Register</span>会員登録</a></li>
        <li><a href="{{ action('LoginController@index') }}"><span>Login</span>ログイン</a></li>
        @endif
      </ul>
    </nav>

    <!--小さな端末用（800px以下端末）メニュー-->
    <nav id="menubar-s">
      <ul>
        @if (admin_user())
        <li><a href="{{ action('Manage\TopController@index') }}"><span>Home</span>ホーム</a></li>
        <li><a href="{{ action('Manage\RegisterController@index') }}"><span>Company</span>一括会員登録</a></li>
        @else
        <li><a href="{{ action('RegisterController@index') }}"><span>Register</span>会員登録</a></li>
        <li><a href="{{ action('LoginController@index') }}"><span>Login</span>ログイン</a></li>
        @endif
      </ul>
    </nav>
  </div>

  <div class="contents">
    <div class="inner">

      <div class="main">

        <section>

          <h2>会員登録フォーム<span>Contact</span></h2>
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          @if (session('message'))
            <div class="message">
              {{ session('message') }}
            </div>
          @endif
          <form action="{{ url('/manage/cms/contents/check') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
              <div>
                <p>
                  <label for="title">タイトル</label>
                  <input type="text" name="title" id="">
                </p>
                <p><label for="main_discription">コンテンツ：メイン内容</label>
                  <textarea name="main_discription" id="" cols="30" rows="10"></textarea>
                </p>
                <p>
                  <label for="main_image">コンテンツ：メイン画像</label>
                  <input type="file" name="main_image" id="">
                </p>
                <p>
                  <label for="main_capture">コンテンツ：メイン画像キャプション</label>
                  <input type="text" name="main_capture" id="">
                </p>
              </div>
              
              <div>
                <p>
                  <label for="second_discription">コンテンツ：サブ１内容</label>
                  <textarea name="second_discription" id="" cols="30" rows="10"></textarea>
                </p>
                <p>
                  <label for="second_image">コンテンツ：サブ１画像</label>
                  <input type="file" name="second_image" id="">
                </p>
                <p>
                  <label for="second_capture">コンテンツ：サブ１画像キャプション</label>
                  <input type="text" name="second_capture" id="">
                </p>
              </div>
              
              <div>
                <p>
                  <label for="third_discription">コンテンツ：サブ２内容</label>
                  <textarea name="third_discription" id="" cols="30" rows="10"></textarea>
                </p>
                <p>
                  <label for="third_image">コンテンツ：サブ２画像</label>
                  <input type="file" name="third_image" id="">
                </p>
                <p>
                  <label for="third_capture">コンテンツ：サブ画像キャプション</label>
                  <input type="text" name="third_capture" id="">
                </p>
              </div>
              
              <div>
                <label for="display_flg">公開フラグ</label>
                <input type="checkbox" name="display_flg" id="" value="1">
              </div>
            </div>
              
            <div>
              <label for="public_at">公開日時</label>
              <input type="date" name="public_at" id="" >
              <label for="end_at">終了日時</label>
              <input type="date" name="end_at" id="" >
            </div>
              
            <p>
              <button class="btn" value="">
                <i>確認画面</i>
              </button>
            </p>
          </form>

        </section>
      </div>

      <div class="sub">

        <nav class="box1">
        <h2>Menu</h2>
          <ul class="submenu">
            @if (admin_user())
            <li><a href="{{ action('Manage\TopController@index') }}">ホーム</a></li>
            <li><a href="{{ action('Manage\RegisterController@index') }}">一括会員登録</a></li>
            @else
            <li><a href="{{ action('RegisterController@index') }}">会員登録</a></li>
            <li><a href="{{ action('LoginController@index') }}">ログイン</a></li>
            @endif
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
