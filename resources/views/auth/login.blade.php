@extends('layouts.logout')

    @section('content')
    <div class="box box-login">
    {!! Form::open() !!}
    <div class="box-min1">
      <h1 class="middle title white">DAWNSNSへようこそ</h1>
        {{ Form::label('e-mail','E-Mail Address',['class' => 'small-box white']) }}
        <BR>
        {{ Form::text('mail',null,['class' => 'small-box  login-input']) }}
        <BR>
        {{ Form::label('password','password',['class' => 'small-box white']) }}
        <BR>
        {{ Form::password('password',['class' => 'small-box  login-input']) }}
        <BR>
        {{ Form::submit('LOGIN',['class' => 'button login-input']) }}
      <p class="middle"><a href="/register">新規ユーザーの方はこちら</a></p>
      </div>
      {!! Form::close() !!}
      </div>
    @endsection
