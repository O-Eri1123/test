@extends('layouts.login')

@section('content')
<div id="top-row">
  <div class="pics">
    <img class="pic" src="{{ asset('images/'.$images->images) }}">
    <div class="btn-row">
      <div class="name-box">
        <h2 class='header prof-name'>UserName</h2>
        <td>{{$images->username}}</td>
      </div>
      <div class="bio-box">
        <h2 class='header prof-bio'>bio</h2>
        <td>{{$images->bio}}</td>
      </div>
    </div>
  </div>

  <div class="buttons">
    @if(in_array($images->id,$followlist))
      <td><a class="btn-unfollow" href="un_follow/{{$images->id}}">Followはずす</a></td>
    @else
      <td><a class="btn-follow" href="follow/{{$images->id}}">Followする</a></td>
    @endif
  </div>
</div>


<div id="small-below">
<div class="small-accout">
  @foreach ($list as $list)
  <tr>
      <div class="index-pix">
      <td><a href="other_profile/{{$list->id}}"><img class="pic" src="{{ asset('images/'.$list->images) }}"></a></td>
      </div>
      <div class="index-prof">
        <div class="name">
        <td>{{ $list->username }}</td>
        </div>
        <div class="posts">
        <td>{{ $list->posts }}</td>
        </div>
      </div>
      <div class="index-date">
      <td>{{ $list->created_at }}</td>
      </div>
  </tr>
  @endforeach
</div>
</div>
@endsection
