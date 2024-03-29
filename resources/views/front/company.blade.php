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
        <li class="current"><a href="company.html"><span>Company</span>会社概要</a></li>
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

      <div class="main">

        <section>

          <h2>会社概要<span>Company</span></h2>

          <table class="ta1">
            <tr>
              <th colspan="2" class="tamidashi">見出しが必要ならここを使います</th>
            </tr>
            <tr>
              <th>所在地</th>
              <td>東京都XX区XXXX</td>
            </tr>
            <tr>
              <th>地図</th>
              <td><a href="http://template-party.com/file/pickup_googlemap.html">Google Mapを使いたい人はこちらの解説をご覧下さい。</a></td>
            </tr>
            <tr>
              <th>見出し</th>
              <td>ここに説明など入れて下さい。サンプルテキスト。</td>
            </tr>
            <tr>
              <th>見出し</th>
              <td>ここに説明など入れて下さい。サンプルテキスト。</td>
            </tr>
            <tr>
              <th>見出し</th>
              <td>ここに説明など入れて下さい。サンプルテキスト。</td>
            </tr>
            <tr>
              <th>見出し</th>
              <td>ここに説明など入れて下さい。サンプルテキスト。</td>
            </tr>
            <tr>
              <th>見出し</th>
              <td>ここに説明など入れて下さい。サンプルテキスト。</td>
            </tr>
          </table>

        </section>

        <section>

          <h2>当テンプレートの使い方<span>Manual</span></h2>

          <h3 class="color1">注意：当テンプレートにはメインメニューが「２箇所」入っています</h3>
          <p>パソコンなどの大きな端末「menubar（幅801px以上）」向けと、スマホなどの小さな端末「menubar-s（幅800px以下）」向けがそれぞれ入っています。大きな端末向けは編集ソフトで見れると思いますが、小さな端末向けは見えないと思いますのでhtml側で編集して下さい。小さい端末向けメニューはhtmlの下の方に入っています。</p>

          <h3>トップページのメニューだけ単独（１箇所）です</h3>
          <p>トップページのメニューだけ全端末共通になっています。<br>
          id名が「menubar-top」なので間違えないようにして下さい。</p>

          <h3>titleタグ、copyright、metaタグ、他の設定</h3>
          <p><strong class="color1">■titleタグの設定はとても重要です。念入りにワードを選んで適切に入力しましょう。</strong><br>
          あなたのホームページ名が「Sample Company」だとすれば、<br>
          <span class="look">&lt;title&gt;Sample Company&lt;/title&gt;</span><br>
          とすればＯＫです。SEO対策もするなら冒頭に重要なワードを入れておきましょう。</p>
          <p><strong class="color1">■copyrightを変更しましょう。</strong><br>
          続いてhtmlの下の方にある、<br>
          <span class="look">Copyright&copy; Sample Company All Rights Reserved.</span><br>
          の部分もあなたのサイト名に変更します。</p>
          <p><strong class="color1">■metaタグを変更しましょう。</strong><br>
          htmlソースが見える状態にしてmetaタグを変更しましょう。</p>
          <p>ソースの上の方に、<br>
          <span class="look">content=&quot;ここにサイト説明を入れます&quot;</span><br>
          という部分がありますので、テキストをサイトの説明文に入れ替えます。検索結果の文面に使われる場合もありますので、見た人が来訪したくなるような説明文を簡潔に書きましょう。</p>
          <p>続いて、その下の行の<br>
          <span class="look">content=&quot;キーワード１,キーワード２,～～～&quot;</span><br>
          も設定します。ここはサイトに関係のあるキーワードを入れる箇所です。10個前後ぐらいあれば充分です。キーワード間はカンマ「,」で区切ります。</p>
          <p><strong class="color1">■h1ロゴのaltタグも変更しましょう。</strong><br>
          html側に<br>
          <span class="look">alt=&quot;Sample Company&quot;</span><br>
          となっている箇所があるので、この部分もあなたのサイト名に変更しましょう。</p>

          <h3>上部のロゴ画像について</h3>
          <p>文字なしの土台画像がbaseフォルダに入っていますのでそれにサイト名をのせてimagesフォルダに上書きして下さい。画像の大きさは自由に変更してもらっても構いませんがある程度大きくしておいた方が高解像度の端末で鮮明に見えます。</p>
          <p><strong class="color1">■ロゴサイズ変更は</strong><br>
          cssフォルダのstyle.cssの「header #logo」のwidthの数字で変更できます。各端末サイズごとに設定がある場合があるので注意して下さい。</p>

          <h3>メインメニューの英語表記に使っているフォントについて</h3>
          <p>cssフォルダのstyle.cssの冒頭でGoogle Fontsを読み込んでそれを指定しています。英語専用フォントです。<br>
          <a href="http://template-party.com/tips/tips13.html" target="_blank">Google Fontsの詳細はこちら。</a></p>

          <h3>現在ページ表示中のメニューについて</h3>
          <p>当ページでいえば上部メインメニューの「Company」に色がついていますが、その設定の説明です。<br>
          通常は、<br>
          &lt;li&gt;&lt;a href=&quot;&quot;&gt;メニュー名&lt;/a&gt;&lt;/li&gt;<br>
          のようになっていますがこれを、<br>
          &lt;li <span class="color1">class=&quot;current&quot;</span>&gt;・・・<br>
          とする事で装飾が入ります。自動で入るわけではないのでご注意下さい。</p>

          <h3>スマホなどの小さな端末からボタンクリックでPC画面を表示させたい方へ</h3>
          <p>レスポンシブデザインだと、スマホやタブレットなどの小さな端末から見た場合はそれ専用のレイアウトに変わりますが、あえてPC画面も見せたいユーザーの為に<a href="http://template-party.com/tips/tips20160916viewport.html">tipsを公開</a>しました。</p>

          <h3>プレビューでチェックすると警告メッセージが出る場合(一部ブラウザ対象)</h3>
          <p>主にjavascript（jsファイル）ファイルによって出る警告ですが、WEB上では出ません。また、この警告が出ている間は効果を見る事ができないので、警告メッセージ内でクリックして解除してあげて下さい。これにより効果がちゃんと見れるようになります。</p>

          <h2>この見出しについて</h2>
          <p>h2タグだけだと上のように１行のシンプル見出しになります。</p>

          <h2>この見出しについて<span>Midashi</span></h2>
          <p>h2タグ内にspanタグを入れると上のように色文字が出ます。詳しくはhtml側でご確認下さい。</p>

        </section>

      </div>
      <!--/main-->

      <div class="sub">

        <nav class="box1">
          <h2>Menu</h2>
          <ul class="submenu">
            <li><a href="index.html">ホーム</a></li>
            <li><a href="company.html">会社概要</a></li>
            <li><a href="service.html">サービス紹介</a></li>
            <li><a href="recruit.html">採用情報</a></li>
            <li><a href="link.html">リンク</a></li>
            <li><a href="register.html">会員登録</a></li>
            <li><a href="contact.html">お問い合わせ</a></li>
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

  <div class="contents">
    <div class="inner">

      <section>

        <h2>このブロックのように１カラムで使いたい場合は</h2>
        <p><span class="color1">&lt;div class=&quot;contents&quot;&gt;<br>
        &lt;div class=&quot;inner&quot;&gt;</span></p>
        <p>ここにコンテンツを入れる</p>
        <p><span class="color1">&lt;/div&gt;<br>
        &lt;/div&gt;</span></p>

      </section>

    </div>
    <!--/inner-->
  </div>
  <!--/contents-->

  <div class="contents bg1">
    <div class="inner">

      <section>

        <h2>背景色をつけたい時は</h2>
        <p>&lt;div class=&quot;contents <span class="color1">bg1</span>&quot;&gt;</p>
        <p>と、bg1を追加すればOKです。※２カラム時も同様。</p>

      </section>

    </div>
    <!--/inner-->
  </div>
  <!--/contents-->

  <div class="contents">
    <div class="inner">

      <div class="main">

        <section>

        <h2>２カラムで使いたい場合はmainとsubブロックを追加して下さい</h2>

        <p><span class="color1">&lt;div class=&quot;contents&quot;&gt;<br>
        &lt;div class=&quot;inner&quot;&gt;</span></p>

        <p><span style="color:red;">&lt;div class=&quot;main&quot;&gt;</span><br>
        ここにメインコンテンツを入れる<br>
        <span style="color:red;">&lt;/div&gt;</span></p>

        <p><span style="color:red;">&lt;div class=&quot;sub&quot;&gt;</span><br>
        ここにサブコンテンツを入れる<br>
        <span style="color:red;">&lt;/div&gt;</span></p>

        <p><span class="color1">&lt;/div&gt;<br>
        &lt;/div&gt;</span></p>

        </section>

      </div>
      <!--/main-->

      <div class="sub">

        <nav class="box1">
          <h2>Menu</h2>
          <ul class="submenu">
            <li><a href="index.html">ホーム</a></li>
            <li><a href="company.html">会社概要</a></li>
            <li><a href="service.html">サービス紹介</a></li>
            <li><a href="recruit.html">採用情報</a></li>
            <li><a href="link.html">リンク</a></li>
            <li><a href="register.html">会員登録</a></li>
            <li><a href="contact.html">お問い合わせ</a></li>
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
