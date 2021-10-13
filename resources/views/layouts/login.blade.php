<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
       <!-- jQueryとの連携 -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/style.js')}}"></script>
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
            <div class="top-pic">
                <h1><a href="top"><img src="{{ asset('images/main_logo.png') }}" ></a></h1>
            </div>
            <div class="top-menu">
            <div class="user-info">
<!-- ユーザーネーム -->
                <span class="user">{{$name}}さん</span>
<!-- ハンバーガーメニュー -->
<!-- 矢印 -->
<div class="drawer">
    <nav class="gnavi">
        <ul>
            <li class="child-nav__item">
                <a href="/top" class="child-nav__link">HOME</a>
            </li>
            <li class="child-nav__item">
                <a href="/my_update" class="child-nav__link">プロフィール編集</a>
            </li>
            <li class="child-nav__item">
                <a href="/logout" class="child-nav__link">ログアウト</a>
            </li>
        </ul>
    </nav>
    <div class="drawer-open">
        <span></span>
    </div>
</div>
<!-- </li> -->
<!-- ハンバーガーメニューの中のメニュー -->
                <!-- <div class="nav-wrapper">
                    <input type="checkbox" id="drawer-check" class="drawer-hidden" >
                    <label for="drawer-check" class="drawer-open"><span></span></label>
                    <nav class="drawer-content">
                        <ul class="drawer-list">
                            <li class="drawer-item">
                                <a href="/top">ホーム</a>
                            </li>
                            <li class="drawer-item">
                                <a href="/my_update">プロフィール</a>
                            </li>
                            <li class="drawer-item">
                                <a href="/logout">ログアウト</a>
                            </li>
                        </ul>
                    </nav>
                </div> -->
<!-- ユーザー写真 -->
                <span class="user-pic"><img class="pic" src="{{ asset('images/'.$image) }}"></span>
            </div>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <div class="side-top bottom-boader">
                <div class="side-head">
                <p >{{$name}}さんの</p>
                </div>
                <div class="counts">
                <p class="">フォロー数</p>
                <p class="bottom">{{$follow_count}}名</p>
                </div>
                <p class="bottom"><a class="side-btn" href="/follow-list">フォローリスト</a></p>
                <div class="counts">
                <p>フォロワー数</p>
                <p class="bottom">{{$follower_count}}名</p>
                </div>
                <p class="bottom"><a class="side-btn" href="/follower-list">フォロワーリスト</a></p>
                </div>
                <p class="bottom margin-top"><a class="side-btn" href="/search">ユーザー検索</a></p>
            </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>
