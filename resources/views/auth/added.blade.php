@extends('layouts.logout')

@section('content')

<div class="box box-added white middle">
<div class="box-min3">
<p class="middle">

    <!-- @if(Auth::check())
        {{ Auth::user()->name }}
    @endif
    </p> -->
    {{$name->username}} さん、</p>
<p class="login-input">ようこそ！DAWNSNSへ！</p>
<p>ユーザー登録が完了しました。</p>
<p class="login-input">さっそく、ログインをしてみましょう。</p>

<p?><a class="button btn-added white" href="/login">ログイン画面へ</a></p>
</div>

@endsection
