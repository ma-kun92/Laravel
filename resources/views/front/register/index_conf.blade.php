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
        <li><a href="{{ url('/') }}"><span>Home</span>ホーム</a></li>
        <li><a href="company.html"><span>Company</span>会社概要</a></li>
        <li><a href="service.html"><span>Service</span>サービス案内</a></li>
        <li><a href="recruit.html"><span>Recruit</span>採用情報</a></li>
        <li><a href="link.html"><span>Link</span>リンク</a></li>
        <li><a href="contact.html"><span>Contact</span>コンタクト</a></li>
        <li><a href="{{ action('LoginController@logout') }}"><span>Logout</span>ログアウト</a></li>
        @else
        <li class="current"><a href="/register/index"><span>Register</span>会員登録</a></li>
        <li><a href="{{ action('LoginController@index') }}"><span>Login</span>ログイン</a></li>
        @endif
      </ul>
    </nav>

    <!--小さな端末用（800px以下端末）メニュー-->
    <nav id="menubar-s">
      <ul>
        @if (admin_user())
        <li><a href="{{ url('/') }}"><span>Home</span>ホーム</a></li>
        <li><a href="company.html"><span>Company</span>会社概要</a></li>
        <li><a href="service.html"><span>Service</span>サービス案内</a></li>
        <li><a href="recruit.html"><span>Recruit</span>採用情報</a></li>
        <li><a href="link.html"><span>Link</span>リンク</a></li>
        <li><a href="contact.html"><span>Contact</span>コンタクト</a></li>
        <li><a href="{{ action('LoginController@logout') }}"><span>Logout</span>ログアウト</a></li>
        @else
        <li class="current"><a href="/register/index"><span>Register</span>会員登録</a></li>
        <li><a href="{{ action('LoginController@index') }}"><span>Login</span>ログイン</a></li>
        @endif
      </ul>
    </nav>

  </div>
  <!--/inner-->

  <div class="contents">
    <div class="inner">

      <div class="main">

        <section>

          <h2>確認画面<span>Contact</span></h2>

          <table class="ta1">
            <tr>
              <th width="150">お名前</th>
              <td>
                {{ $data['name_sei'] }} {{ $data['name_mei'] }}
              </td>
            </tr>
            <tr>
              <th>ふりがな</th>
              <td>
                {{ $data['name_sei_kana'] }} {{ $data['name_mei_kana'] }}
              </td>
            </tr>
            <tr>
              <th>性別</th>
              <td>
                @if($data['sex'] == '1')
                男性
                @elseif($data['sex'] == '2')
                女性
                @endif
              </td>
            </tr>
            <tr>
              <th>メールアドレス</th>
              <td>
                {{ $data['email'] }}
              </td>
            </tr>
            <tr>
              <th>パスワード</th>
              <td>
                ********
              </td>
            </tr>
            <tr>
              <th>郵便番号</th>
              <td>
                  {{ $data['zip1'] }} {{ $data['zip2'] }}
              </td>
            </tr>
            <tr>
              <th>住所</th>
              <td>
                {{ convert_prefecture_id($data['prefecture_id']) }}
                {{ $data['address1'] }}
                {{ $data['address2'] }}
                {{ $data['address3'] }}
              </td>
            </tr>
            <tr>
              <th>備考</th>
              <td>
                {{ $data['comment'] }}
              </td>
            </tr>
          </table>

          <div class="c">
            <form action="{{ url('/register/end') }}" method="post">
              @csrf
              <input type="submit" name="go" value="送信する">
              &nbsp;
              <input type="submit" value="戻る">
            </form>
          </div>

        </section>

      </div>
      <!--/main-->

      <div class="sub">

        <nav class="box1">
          <h2>Menu</h2>
          <ul class="submenu">
            @if (admin_user())
            <li><a href="{{ url('/') }}">ホーム</a></li>
            <li><a href="company.html">会社概要</a></li>
            <li><a href="service.html">サービス案内</a></li>
            <li><a href="recruit.html">採用情報</a></li>
            <li><a href="link.html">リンク</a></li>
            <li><a href="contact.html">コンタクト</a></li>
            <li><a href="{{ action('LoginController@logout') }}">ログアウト</a></li>
            @else
            <li class="current"><a href="/register/index">会員登録</a></li>
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
