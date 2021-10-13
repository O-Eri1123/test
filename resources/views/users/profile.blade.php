@extends('layouts.login')

@section('content')
<div id="top-row">
  <div class="pics">
      <img class="pic" src="{{ asset('images/'.$images->images) }}">
      <td>{{$images->username}}</td>
      <td>{{$images->bio}}</td>
  </div>
</div>

    @if(in_array($images->id,$followlist))
                <td><a class="btn-unfollow" href="pc/{{$images->id}}">Followはずす</a></td>
    @else
                <td><a class="btn-follow" href="sloth/{{$images->id}}">Followする</a></td>
    @endif

<div>
@foreach ($list as $list)
      <tr>
        <td><a href="profile/{{$list->id}}"><img class="pic" src="{{ asset('images/'.$list->images) }}"></a></td>
        <td>{{ $list->username }}</td>
        <td>{{ $list->posts }}</td>
        <td>{{ $list->created_at }}</td>
      </tr>
@endforeach
</div>


@endsection
