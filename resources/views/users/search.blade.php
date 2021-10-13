@extends('layouts.login')

@section('content')
<div id="top-row">
    <div class="form-search">
    {!! Form::open(['url' => 'search']) !!}
    {!! Form::input('text', 'name', null, ['required', 'class' =>'form-search', 'placeholder' =>'ユーザー名']) !!}
    </div>
    <button type="button" class="side-search">検索</button>
    {!! Form::close() !!}
  </div>

  @foreach ($users as $list)
    <div id="below">
      <div class="account-search">
          <tr>
            <div class="search-pix">
            <td><img class="pic" src="{{ asset('images/'.$list->images) }}"></td>
            </div>
            <div class="search-prof">
            <div class="name">
            <td>{{ $list->username }}</td>
            </div>
            </div>
            <div class="search-btn">
      @if(in_array($list->id,$followlist))
            <td><a class="btn-unfollow" href="pc/{{$list->id}}">Followはずす</a></td>
      @else
            <td><a class="btn-follow" href="sloth/{{$list->id}}">Followする</a></td>
      @endif
            </div>
          </tr>
      </div>
  </div>
  @endforeach
@endsection
