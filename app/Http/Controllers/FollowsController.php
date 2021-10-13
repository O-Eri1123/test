<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        $image = Auth::user()->images;
        $name = Auth::user()->username;
        $user_id = Auth::user()->id;
        $follow_count = \DB::table('follows')->where('follower',$user_id)->get()->count();
        $follower_count = \DB::table('follows')->where('follow',$user_id)->get()->count();
        $follow_list = \DB::table('posts')->select('posts.created_at','users.images','posts.posts','users.id','users.username')->leftjoin('users','users.id', '=', 'posts.user_id')->join('follows' , 'users.id', '=' , 'follows.follow')->where('follower',$user_id)->get();
        return view('follows.followList',compact('name','follow_list','follow_count','follower_count','user_id','image'));
    }
    public function followerList(){
        $image = Auth::user()->images;
        $name = Auth::user()->username;
        $user_id = Auth::user()->id;
        $follow_count = \DB::table('follows')->where('follower',$user_id)->get()->count();
        $follower_count = \DB::table('follows')->where('follow',$user_id)->get()->count();
        $follow_list = \DB::table('posts')->select('posts.created_at','users.images','posts.posts','users.id','users.username')->leftjoin('users','users.id', '=', 'posts.user_id')->join('follows' , 'users.id', '=' , 'follows.follower')->where('follow',$user_id)->get();
        return view('follows.followerList',compact('name','follow_list','follow_count','follower_count','user_id','image'));
    }
}
