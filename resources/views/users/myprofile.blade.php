@extends('layouts.login')

@section('content')
    <div class="prof-top">
        <img class="pic-prof" src="{{ asset('images/'.$image) }}">
        <div class="account">
        <h2 class='header prof-name'>UserName</h2>
        {!! Form::open(['url' => '/myupdate', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::input('text', 'upName', $name, ['required', 'class' => 'form-basic']) !!}
        </div>
        </div>
    </div>

    <div class="body">
        <div class="account">
        <h2 class='header prof-email'>MailAddress</h2>
        <div class="form-group">
            {!! Form::input('text', 'upMail',$mail, ['required', 'class' => 'form-basic']) !!}
        </div>
        </div>

        <div class="account">
        <h2 class='header prof-pass'>Password</h2>
        <div class="form-group">
            {!! Form::input('text', 'oldPass',$pass, ['required', 'class' => 'form-basic']) !!}
        </div>
        </div>

        <div class="account">
        <h2 class='header prof-npass'>new Password</h2>
        <div class="form-group">
            {{ Form::password('newPass',['class' => 'form-basic']) }}

        </div>
        </div>

        <div class="account">
        <h2 class='header prof-bio'>bio</h2>
        <div class="form-group">
            {!! Form::input('text', 'newBio',null, ['class' => 'form-basic']) !!}
        </div>
        </div>

        <div class="account">
        <h2 class='header prof-image'>Icon Image</h2>
        <div class="form-group">
            {{Form::file('image', ['class'=>'form-image','id'=>'fileImage'])}}
            {{Form::label('','',['class'=>'form-image'])}}
        </div>
        </div>

        <button type="submit" class="btn-refresh" >更新</button>
        {!! Form::close() !!}
    </div>

@endsection
