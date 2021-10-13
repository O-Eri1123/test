<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

// class PostsController extends Controller
// {
//     //
//     public function index(){
//         return view('posts.index');
//     }

// // バリデーション
// public $validateRules = [
//     'username'=>'required',
//     'mail'=>'required|email',
//     'password'=>'required',
//     'password-confirm'=>'required'
// ];
// // エラーメッセージ
// public $validateMessages = [
//     "required"=>"必須項目です。",
//     "mail"=>"メールアドレス形式で入力してください。"
// ];
// public function postIndex()
// {
//     // postしたデータを全て取得
//     $data = Request::all();

//     // バリデーションをインスタンス化
//     $val = Validator::make(
//         $data,
//         $this->validateRules,
//         $this->validateMessages
//     );
//     // バリデーションNGの場合
//     if($val->fails()){
//         return redirect('/post')->withErrors($val)->withInput();
//     }
//     return 'OK!';
// }
// }

// added.blade.phpへの値を送る→値を受ける方法は？
// public function test() {

//     $username = "新規登録したユーザー名";

//     return view('views/auth/added',compact('username'));
// }
?>
