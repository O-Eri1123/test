@extends('layouts.logout')

@section('content')
<div class="box box-register">
  {!! Form::open() !!}
  <div class="box-min2">
  <h2 class="middle title white">新規ユーザー登録</h2>


{{ Form::label('ユーザー名','username',['class' => 'small-box white']) }}
{{ Form::text('username',null,['class' => 'small-box login-input']) }}

@if($errors->has('username'))<p class="error">{{ $errors ->first('username') }}</p>
@endif


{{ Form::label('メールアドレス','E-Mail Address',['class' => 'small-box white']) }}
{{ Form::text('mail',null,['class' => 'small-box  login-input']) }}

@if($errors->has('mail'))<p class="error">{{ $errors ->first('mail') }}</p>
@endif


{{ Form::label('パスワード','password',['class' => 'small-box white']) }}
{{ Form::text('password',null,['class' => 'small-box  login-input']) }}

@if($errors->has('password'))<p class="error">{{ $errors ->first('password') }}</p>
@endif


{{ Form::label('パスワード確認','password_confirm',['class' => 'small-box white']) }}
{{ Form::text('password-confirmation',null,['class' => 'small-box  login-input']) }}

@if($errors->has('password-confirmation'))<p class="error">{{ $errors->first('password-confirmation') }}</p>
@endif


{{ Form::submit('REGISTER',['class' => 'button login-input']) }}

<p class="middle"><a href="/login">ログイン画面へ戻る</a></p>

</div>
{!! Form::close() !!}

</div>
@endsection
