<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    //
    public function index(){
        // $name = \DB::table('users')->username;
        $name = Auth::user()->username;
        $image = Auth::user()->images;
        $user_id = Auth::user()->id;
        $follow_count = \DB::table('follows')->where('follower',$user_id)->get()->count();
        $follower_count = \DB::table('follows')->where('follow',$user_id)->get()->count();
        // dd($name);
        $list = \DB::table('posts')->select('posts.created_at','users.images','posts.posts','posts.id','users.username','posts.user_id')->leftjoin('users','users.id', '=', 'posts.user_id')->join('follows' , 'users.id', '=' , 'follows.follow')->where('follower', Auth::user()->id)->orwhere('users.id',Auth::user()->id)->get();
        // dd($list);
        $user_id = Auth::user()->id;
        return view('posts.index',compact('name','list','user_id','image','follow_count','follower_count'));
    }

    public function create(Request $request)
    {
        $user_id = Auth::user()->id;
        $post = $request->input('newPost');
        \DB::table('posts')->insert([
            'user_id' => $user_id,
            'posts' => $post
        ]);
        return redirect('/top');
    }

    public function post_update($id)
    {
        $user_id = Auth::user()->id;
        $list = \DB::table('posts')->join('users' , 'posts.user_id', '=' , 'users.id')->select('posts.id','posts.posts','posts.user_id','posts.created_at','posts.updated_at','users.images','users.username')->where('posts.id',$id)->first();
        // dd($list);
        return redirect('/update',compact('user_id','list'));
    }

        public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        \DB::table('posts')
            ->where('id', $id)
            ->update(
                ['posts' => $up_post]
            );
        return redirect('/top');
    }

        public function post_delete($id)
    {
        $user_id = Auth::user()->id;
        \DB::table('posts')->where('user_id',$user_id)->where('id',$id)
            ->delete();
        return redirect('/top');
    }

}
