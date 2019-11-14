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
<link rel="stylesheet" href="/css/style-add.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/add.js"></script>
<script type="text/javascript" src="/js/openclose.js"></script>
<script type="text/javascript" src="/js/def.js"></script>
<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

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
        <li><a href="{{ action('Manage\SliderController@index') }}"><span>Slider</span>スライダー登録</a></li>
        <li><a href="{{ action('Manage\SliderController@show') }}"><span>Slider</span>スライダー一覧</a></li>
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
        <li><a href="{{ action('Manage\SliderController@index') }}"><span>Slider</span>スライダー登録</a></li>
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
          <p>登録一覧<a href="{{ action('Manage\SliderController@sort') }}"><span>並び替え</span></a></p>
          <div>
          <form action="{{ url('manage/cms/slider/sort_check') }}" method="post">
            @csrf
            <table>
              <thead>
                <tr>
                  <th>スライダー名</th>
                  <th>登録画像</th>
                  <th>登録日時</th>
                  <th>キャプション</th>

                  <th>表示フラグ</th>
                  <th>詳細</th>
                </tr>
              </thead>
              <input id="slider_ids" type="hidden" name="slider_ids[]">
              <tbody id="sortdata">
                @foreach ($data as $d)
                <tr>
                  <input id="{{ 'slider_'.$d->sort_num }}" type="hidden" name="slider_nums[]" value="{{ $d->sort_num }}" class="sliders">
                  <th name="slider_num">{{ $d->name }}</td>
                  <td><img src="{{ $d->image_url }}" alt="" width="200" height="300"></td>
                  <td>{{ $d->created_at }}</td>
                  <td>{{ $d->caption }}</td>
                  <td>{{ $d->display_flg }}</td>
                  <td>
                    <a href=""><button>詳細</button></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <input type="submit" value="並び替える">
          </form>
            
          </div>
        </section>
      </div>
      <div class="sub">

        <nav class="box1">
        <h2>Menu</h2>
          <ul class="submenu">
            @if (admin_user())
            <li><a href="{{ action('Manage\TopController@index') }}">ホーム</a></li>
            <li><a href="{{ action('Manage\RegisterController@index') }}">一括会員登録</a></li>
            <li><a href="{{ action('Manage\SliderController@index') }}">スライダー登録</a></li>
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
