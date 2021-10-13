@extends('layouts.login')

@section('content')
    <div id="small-row">
        <img class="pic" src="{{ asset('images/'.$image) }}">
        <div class="form-control">
            {!! Form::open(['url' => 'create']) !!}
            {!! Form::text('newPost', null, ['required', 'class' =>'form-control', 'placeholder' =>'何をつぶやこうか？']) !!}
        </div>
        <button type="submit" class="button-tweet"><img src="{{ asset('images/post.png') }}" ></button>
        {!! Form::close() !!}
    </div>

    @foreach ($list as $list)
        <div id="small-below">
        <div class="small-accout">
            <!-- グループA 写真-->
            <tr>
            <div class="index-pix">
                <td><img class="pic" src="{{ asset('images/'.$list->images) }}"></td>
            </div>
            <!-- グループB　名前・投稿 -->
            <div class="index-prof">
                    <div class="name">
                    <td>{{ $list->username }}</td>
                    </div>
                    <div class="posts">
                    <td>{{ $list->posts }}</td>
                    </div>
            </div>
            <!-- グループC 日付・編集ボタン・削除ボタン-->
            <div class="index-date">
                    <td class="date">{{ $list->created_at }}</td>
            </tr>
            @if($list->user_id == $user_id)
                <td>
                  <a href="" class="modalopen" data-target="modal{{$list->id}}">
                    <img class="edit-pic" src="{{ asset('images/edit.png') }}" >
                  </a>
                </td>
                <td><a class="submit" href="/post_delete/{{$list->id}}" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
                    <img class="trash" src="{{ asset('images/trash.png') }}" alt="" onMouseOver="this.src='{{ asset('images/trash_h.png') }}'" onMouseOut="this.src='{{ asset('images/trash.png') }}'">
                </a></td>
            @endif
                <div class="modal-main js-modal" id="modal{{$list->id}}">
                <div class="inner">
                    <div class="inner-content">
                        <h2>投稿内容を変更</h2>
                        {!! Form::open(['url' => '/update']) !!}
                        <div class="form-group">
                        {!! Form::hidden('id', $list->id) !!}
                        {!! Form::input('text', 'upPost', $list->posts, ['required', 'class' => 'update-form']) !!}
                        </div>
                        <div class="btn-row">
                        <button type="submit" class="btn-edit"><img src="{{ asset('images/edit.png') }}" ></button>
                        {!! Form::close() !!}
                        <a href="" class="modalClose">Close</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
    @endforeach
@endsection
    <div class="modal-overlay"></div>
