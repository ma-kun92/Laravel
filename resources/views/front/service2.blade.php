<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>システム構築学習用</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="ここにサイト説明を入れます">
<meta name="keywords" content="キーワード１,キーワード２,キーワード３,キーワード４,キーワード５">
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/openclose.js"></script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>

  <div class="inner">

    <header>
      <div class="inner">
        <h1 id="logo"><a href="index.html"><img src="images/logo.png" alt="Sample Company"></a></h1>
      </div>
    </header>

    <!--PC用（801px以上端末）メニュー-->
    <nav id="menubar">
      <ul class="inner">
        <li><a href="index.html"><span>Home</span>ホーム</a></li>
        <li><a href="company.html"><span>Company</span>会社概要</a></li>
        <li><a href="service.html"><span>Service</span>サービス案内</a></li>
        <li><a href="recruit.html"><span>Recruit</span>採用情報</a></li>
        <li><a href="link.html"><span>Link</span>リンク</a></li>
        <li><a href="register.html"><span>Register</span>会員登録</a></li>
        <li><a href="contact.html"><span>Contact</span>コンタクト</a></li>
      </ul>
    </nav>

    <!--小さな端末用（800px以下端末）メニュー-->
    <nav id="menubar-s">
      <ul>
        <li><a href="index.html">ホーム</a></li>
        <li><a href="company.html">会社概要</a></li>
        <li><a href="service.html">サービス案内</a></li>
        <li><a href="recruit.html">採用情報</a></li>
        <li><a href="link.html">リンク</a></li>
        <li><a href="register.html">会員登録</a></li>
        <li><a href="contact.html">コンタクト</a></li>
      </ul>
    </nav>

  </div>
  <!--/inner-->

  <div class="contents">
    <div class="inner">

      <article>

        <h2>詳細ページ</h2>

        <figure class="mb15 c">
        <img src="images/bg_s.png" alt="写真の説明を入れます">
        </figure>

        <table class="ta1">
          <tr>
            <th colspan="2" class="tamidashi">見出しが必要であればここを使います</th>
          </tr>
          <tr>
            <th>サンプル見出し</th>
            <td>サンプルテキスト。</td>
          </tr>
          <tr>
            <th>サンプル見出し</th>
            <td>サンプルテキスト。</td>
          </tr>
          <tr>
            <th>サンプル見出し</th>
            <td>サンプルテキスト。</td>
          </tr>
          <tr>
            <th>サンプル見出し</th>
            <td>サンプルテキスト。</td>
          </tr>
          <tr>
            <th>サンプル見出し</th>
            <td>サンプルテキスト。</td>
          </tr>
        </table>

      </article>

      <p><a href="javascript:history.back()">&lt;&lt; 前のページに戻る</a></p>

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
      <small>Copyright&copy; <a href="index.html">SAMPLE COMPANY</a> All Rights Reserved.</small>
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
