<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    public function search(){
        $name = Auth::user()->username;
        $users =  \DB::table('users')->get();
        $user_id = Auth::user()->id;
        $follow_count = \DB::table('follows')->where('follower',$user_id)->get()->count();
        $follower_count = \DB::table('follows')->where('follow',$user_id)->get()->count();
        return view('users.search',compact('name','users','follow_count','follower_count','user_id'));
    }
    public function user_search(Request $request)
    {
        $username = $request->input('name');
        $name = Auth::user()->username;
        $user_id = Auth::user()->id;
        $follow_count = \DB::table('follows')->where('follower',$user_id)->get()->count();
        $follower_count = \DB::table('follows')->where('follow',$user_id)->get()->count();
        $image = Auth::user()->images;
        $book = \DB::table('follows')->select('follow')->where('follower',$user_id)->get();
        $followlist =[];
        foreach ($book as $book) {
        $followlist[] = $book->follow;
        }
    if(!empty($username)){
        $users = \DB::table('users')->where('username','like','%'.$username.'%')->where('id','<>',$user_id)->get();
        return view('users.search',compact('users','name','followlist','image','follow_count','follower_count'));
    }
        $users = \DB::table('users')->where('id','<>',$user_id)->get();
        return view('users.search', compact('users','name','followlist','image','follow_count','follower_count'));
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
        return redirect('/search');
    }

    public function delete($id)
    {
        $user_id = Auth::user()->id;
        \DB::table('follows')
            ->where('follow', $id)->where('follower',$user_id)
            ->delete();

        return redirect('/search');
    }
    public function profile($userprofile)
    {
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
        return view('users.profile',compact('name','list','images','followlist','follow_count','follower_count'));
    }

    // public function myprofile()
    // {
    //     $name = Auth::user()->username;
    //     return view('users.myprofile',compact('name'));
    // }
    public function myprofile(){
        // $name = \DB::table('users')->username;
        $user_id = Auth::user()->id;
        $image = Auth::user()->images;
        $pass = Auth::user()->password;
        $name = Auth::user()->username;
        $mail = Auth::user()->mail;
        $follow_count = \DB::table('follows')->where('follower',$user_id)->get()->count();
        $follower_count = \DB::table('follows')->where('follow',$user_id)->get()->count();
        // dd($name);
        $list = \DB::table('posts')->select('posts.created_at','users.images','posts.posts','posts.id','users.username','posts.user_id')->leftjoin('users','users.id', '=', 'posts.user_id')->join('follows' , 'users.id', '=' , 'follows.follow')->where('follower', Auth::user()->id)->orwhere('users.id',Auth::user()->id)->get();
        // dd($list);
        return view('users.myprofile',compact('image','pass','name','pass','mail','list','user_id','follow_count','follower_count'));
    }

    public function my_update(Request $request)
    {
        $user_id = Auth::user()->id;
        $follow_count = \DB::table('follows')->where('follower',$user_id)->get()->count();
        $follower_count = \DB::table('follows')->where('follow',$user_id)->get()->count();
        $image = Auth::user()->images;
        $pass = Auth::user()->password;
        $name = Auth::user()->username;
        $mail = Auth::user()->mail;
        $id = $request->input('id');
        $up_name = $request->input('upName');
        $up_mail = $request->input('upMail');
        $old_pass = $request->input('oldPass');
        $up_pass = $request->input('newPass');
        $up_bio = $request->input('newBio');
        $up_image = $request->file('image');

        // dd($request->file('image'));
        if(!isset($up_pass) && !isset($up_image) && !isset($up_bio)){
        \DB::table('users')
            ->where('id', $user_id)
            ->update(
                ['username' =>$up_name, 'mail'=>$up_mail,]
            );
        return redirect('/my_update');
        }

        elseif(!isset($up_pass) && !isset($up_image)){
        \DB::table('users')
            ->where('id', $user_id)
            ->update(
                ['username' =>$up_name, 'mail'=>$up_mail,'bio'=>$up_bio]
            );
        return redirect('/my_update');
        }

        elseif(!isset($up_image) && !isset($up_bio)){
        \DB::table('users')
            ->where('id', $user_id)
            ->update(
                ['username' =>$up_name, 'mail'=>$up_mail, 'password' => bcrypt($request['newPass'])]
            );
        return redirect('/my_update');
        }

        elseif(!isset($up_pass) && !isset($up_bio)){
        // dd($request->file('image'));
            $up_image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images',$up_image,'public_uploads');
        \DB::table('users')
            ->where('id', $user_id)
            ->update(
                ['username' =>$up_name, 'mail'=>$up_mail,'images'=>$up_image]
            );
        return redirect('/my_update');
        }

       elseif(!isset($up_pass)){
            $up_image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images',$up_image,'public_uploads');
        \DB::table('users')
            ->where('id', $user_id)
            ->update(
                ['username' =>$up_name, 'mail'=>$up_mail,'images'=>$up_image,'bio'=>$up_bio ]
            );
        return redirect('/my_update');
        }

        elseif(!isset($up_image)){
        \DB::table('users')
            ->where('id', $user_id)
            ->update(
                ['username' =>$up_name, 'mail'=>$up_mail, 'password' => bcrypt($request['newPass']),'bio'=>$up_bio ]
            );
        return redirect('/my_update');
        }

        elseif(!isset($up_bio)){
            $up_image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images',$up_image,'public_uploads');
        \DB::table('users')
            ->where('id', $user_id)
            ->update(
                ['username' =>$up_name, 'mail'=>$up_mail,'password' => bcrypt($request['newPass']),'images'=>$up_image ]
            );
        return redirect('/my_update');
        }

        else{
            $up_image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images',$up_image,'public_uploads');
        \DB::table('users')
            ->where('id', $user_id)
            ->update(
                ['username' =>$up_name, 'password' => bcrypt($request['newPass']), 'mail'=>$up_mail,'images'=>$up_image,'bio'=>$up_bio ]
            );
        return redirect('/my_update');
        }
    }

    // ログアウト
    public function logout()
    {   session()->flush();
        Auth::logout();
        return redirect('/login');
}
}

        // $name = Auth::user()->username;
        // $users =  \DB::table('users')->get();
        // return view('users.search',compact('name','users'));

    // public function index(Request $request){
    //     $query = User::query();

    // public function (){
    //     \DB::table('follows')
    //         ->where('id', $id)
    //         ->delete();
    //     return view('users.search');
    // }
