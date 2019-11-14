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

  <div class="contents">
    <div class="inner">

      <div class="main">

        <section>

          <h2>会員登録フォーム<span>Contact</span></h2>

          <form name="form1" enctype="multipart/form-data" method="post" action="{{ url('/register/check') }}" class="h-adr">
            @csrf
            <span class="p-country-name" style="display:none;">Japan</span>
            
            <table class="">
              <tr>
                <th width="150">お名前<span class="red bold">※</span></th>
                <td>
                <input name="name_sei" id="name_sei" value="" type="text" maxlength="32" class="" placeholder="姓">
                <input name="name_mei" id="name_mei" value="" type="text" maxlength="32" class="" placeholder="名">
                </td>
              </tr>
              <tr>
                <th>ふりがな</th>
                <td>
                <input name="name_sei_kana" id="name_sei_kana" value="" type="text" maxlength="32" class="" placeholder="せい">
                <input name="name_mei_kana" id="name_mei_kana" value="" type="text" maxlength="32" class="" placeholder="めい">
                </td>                      
              </tr>
              <tr>
                <th>性別<span class="red bold">※</span></th>
                <td>
                <input name="sex" id="sex1" value="1" type="radio" checked><label for="sex1">男性</label>
                <input name="sex" id="sex2" value="2" type="radio"><label for="sex2">女性</label>
                </td>
              </tr>
              <tr>
                <th>メールアドレス<span class="red bold">※</span></th>
                <td>
                <input name="email" id="email" value="" type="text" maxlength="128" class="" placeholder="info@example.com">
                </td>
              </tr>
              <tr>
                <th>パスワード<span class="red bold">※</span></th>
                <td>
                <input name="passwd" id="" value="" type="password" maxlength="32" class="wl">
                </td>
              </tr>
              <tr>
                <th>確認用パスワード<span class="red bold">※</span></th>
                <td>
                <input name="passwd_confirmation" id="" value="" type="password" maxlength="32" class="wl">
                </td>
              </tr>
              <tr>
                <th>郵便番号<span class="red bold">※</span></th>
                <td>
                <input name="zip1" id="zip1" value="" type="text" maxlength="3" class="p-postal-code" placeholder="000">
                <input name="zip2" id="zip2" value="" type="text" maxlength="4" class="p-postal-code" placeholder="0000">
                <input type="button" value="住所反映" onclick="">
                </td>
              </tr>
              <tr>
                <th>
                住所<span class="red bold">※</span><br>
                <span class="mini1 red">ビル建物名は任意入力</span>
                </th>
                <td>
                <select name="prefecture_id" id="prefecture_id" class="form-control p-region-id">
                  {{show_all($data['prefecture_id'] ??'')}}
                </select>
                <input name="address1" id="address1" value="{{ $data['address1'] ?? '' }}" type="text" maxlength="64" class="p-locality" placeholder="渋谷区">
                <input name="address2" id="address2" value="{{ $data['address2'] ?? '' }}" type="text" maxlength="64" class="p-street-address" placeholder="東３－１２－１２">
                <input name="address3" id="address3" value="{{ $data['address3'] ?? '' }}" type="text" maxlength="64" class="p-extended-address" placeholder="祐ビル２F">
                </td>
              </tr>
              <tr>
                <th>備考</th>
                <td>
                <textarea name="comment" cols="40" rows="10" class=""></textarea>
                </td>
              </tr>
            </table>
            <div class="c">
              <input type="submit" value="内容を確認する">
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
