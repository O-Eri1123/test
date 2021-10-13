@extends('layouts.login')

@section('content')
        <h2 class='page-header'>投稿内容を変更する</h2>
        {!! Form::open(['url' => '/update']) !!}
        <div class="form-group">
            {!! Form::hidden('posts.id', $list->id) !!}
            {!! Form::input('text', 'upPost', $list->posts, ['required', 'class' => 'form-control']) !!}
        </div>
        <button type="submit" class="btn btn-primary pull-right">更新</button>
        {!! Form::close() !!}
@endsection
