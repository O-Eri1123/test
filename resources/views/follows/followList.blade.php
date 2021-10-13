@extends('layouts.login')

@section('content')
<div id="top-row">
<h2 class='page-header'>Follow list</h2>
<div class="pics">
@foreach($follow_list as $list)
      <a href="other_profile/{{$list->id}}"><img class="pic" src="{{ asset('images/'.$list->images) }}"></a>
@endforeach
</div>
</div>

@foreach ($follow_list as $list)
<div id="small-below">
      <div class="small-accout">
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
                  <td class="date">{{ $list->created_at }}</td>
                  </div>
            </tr>
      </div>
</div>
@endforeach

@endsection
