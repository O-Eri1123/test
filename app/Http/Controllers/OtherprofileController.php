<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class OtherprofileController extends Controller
{
public function other_profile($userprofile)
    {
        $image = Auth::user()->images;
        $user_id = Auth::user()->id;
        $name = Auth::user()->username;
        $follow_count = \DB::table('follows')->where('follower',$user_id)->get()->count();
        $follower_count = \DB::table('follows')->where('follow',$user_id)->get()->count();
        $list = \DB::table('posts')->select('posts.created_at','users.images','posts.posts','users.id','users.username')->leftjoin('users','users.id', '=', 'posts.user_id')->where('posts.user_id',$userprofile)->get();
        $images = \DB::table('users')->where('id',$userprofile)->first();
        $book = \DB::table('follows')->select('follow')->where('follower',$user_id)->get();
        $followlist =[];
        foreach ($book as $book) {
        $followlist[] = $book->follow;
        }
        // $profile = \DB::table('users')
        return view('users.other_profile',compact('user_id','name','list','images','followlist','follow_count','follower_count','image'));
    }

      public function create($id)
    {
        $user_id = Auth::user()->id;
        \DB::table('follows')->insert([
            // フォローする人
            'follower' => $user_id,
            // フォローされる人
            'follow' => $id
        ]);
        return redirect('/other_profile');
    }

    public function delete($id)
    {
        $user_id = Auth::user()->id;
        \DB::table('follows')
            ->where('follow', $id)->where('follower',$user_id)
            ->delete();

        return redirect('/other_profile');
    }
}
