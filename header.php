<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="keywords" content="共通キーワード" />
  <meta name="description" content="共通ディスクリプション" />
  <title>PACIFIC MALL DEVELOPMENT</title>
  <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/common/favicon.ico" />
  <link href="https://fonts.googleapis.com/earlyaccess/notosansjapanese.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Vollkorn:400i" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/styles.css" />
  <script type="text/javascript" src="./assets/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="./assets/js/bundle.js"></script>
</head>
<body>
  <div class="container">
    <header id="header">
      <div class="header-inner">
        <div class="logo">
          <a class="logo-header" href="/pacificmall">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/common/logo-main.svg" class="main-logo" alt="PACIFIC MALL DEVELOPMENT" />
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/common/logo-fixed.svg" class="fixed-logo" alt="PACIFIC MALL DEVELOPMENT" />
          </a>
        </div>
        <button class="toggle-menu js-toggoleNav">
          <span class="toggle-line">メニュー</span>
        </button>
        <div class="header-nav">
          <nav class="global-nav">
            <ul class="menu">
              <li class="menu-item">
                <a class="nav-link active" href="#">ホーム</a>
              </li>
              <li class="menu-item">
                <a class="nav-link" href="#">企業情報</a>
              </li>
              <li class="menu-item">
                <a class="nav-link" href="#">店舗情報</a>
              </li>
              <li class="menu-item">
                <a class="nav-link" href="#">地域貢献活動</a>
              </li>
              <li class="menu-item">
                <a class="nav-link" href="#">ニュースリリース</a>
              </li>
              <li class="menu-item">
                <a class="nav-link" href="#">お問い合わせ</a>
              </li>
            </ul>
          </nav>
          <form class="search-form" role="search" method="get" action="">
            <div class="search-box">
              <input type="text" class="search-input" name="" placeholder="キーワードを入力してください" />
              <button type="submit" class="button-submit"></button>
            </div>
            <div class="search-buttons">
              <button type="button" class="close-icon js-searchIcon"></button>
              <button type="button" class="search-icon js-searchIcon"></button>
            </div>
          </form>
        </div>
      </div>
    </header>
    <section class="section-contents" id="keyvisual">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/bg-section-keyvisual.jpg" alt="MAIN IMAGE" />
      <div class="wrapper">
        <h1 class="site-title">Connecting the future.</h1>
        <p class="site-caption">
          私たちパシフィックモール開発は<br />
          世界各地のショッピングモール開発を通じて<br />
          人と人、人と地域を結ぶお手伝いをしています。
        </p>
      </div>
    </section>
    <section class="section-contents" id="contribution">
      <div class="wrapper">
        <span class="section-title-en">Regional Contribution</span>
        <h2 class="section-title">地域貢献活動</h2>
        <p class="section-lead">人と地域を結ぶ活動を行っております</p>
        <div class="articles">
          <article class="article-card">
            <a class="card-link" href="#">
              <div class="card-inner">
                <div class="card-image">
	                <img src="#" alt="" />
                </div>
                <div class="card-body">
                  <p class="title">街のちびっこダンス大会</p>
                  <p class="excerpt">2022年8月大手町モールにて「街のちびっこダンス大会」を開催しました。近年はダンス教室に通うお子様も多く、お子様同士や親御様同士の交流の場となればと思い企画いたしました。</p>
                  <div class="buttonBox">
                    <button type="button" class="seeDetail">MORE</button>
                  </div>
                </div>
              </div>
            </a>
          </article>
          <article class="article-card">
            <a class="card-link" href="#">
              <div class="card-inner">
                <div class="card-image">
	                <img src="#" alt="" />
                </div>
                <div class="card-body">
                  <p class="title">都市カンファレンス</p>
                  <p class="excerpt">新しい都市の構想を考える LAモールでは2022年8月20日、モール周辺のロサンゼルスの新しい都市構想について、モールにいらっしゃったお客様と考えるカンファレンスを開催いたしました。</p>
                  <div class="buttonBox">
                    <button type="button" class="seeDetail">MORE</button>
                  </div>
                </div>
              </div>
            </a>
          </article>
          <article class="article-card">
            <a class="card-link" href="#">
              <div class="card-inner">
                <div class="card-image">
	                <img src="#" alt="" />
                </div>
                <div class="card-body">
                  <p class="title">タムリンフェスティバル</p>
                  <p class="excerpt">今年もタムリンフェスティバルは大盛況 2022年9月にインドネシアのタムリンホールにて「タムリンフェスティバル」を開催しました。</p>
                  <div class="buttonBox">
                    <button type="button" class="seeDetail">MORE</button>
                  </div>
                </div>
              </div>
            </a>
          </article>
        </div>
        <div class="section-buttons">
          <button type="button" class="button button-ghost" onclick="javascript:location.href = '#';">
            地域貢献活動一覧を見る
          </button>
        </div>
      </div>
    </section>