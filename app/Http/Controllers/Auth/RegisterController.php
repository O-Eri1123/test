<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Request as PostRequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'username' => 'required|string|max:255',
    //         'mail' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:4|confirmed',
    //     ]);
    // }

    // バリデーション
public $validateRules = [
    "username" => "required|string|max:12",
    "mail" => "required|string|email|unique:users",
    "password" => "required|string|max:12",
    "password-confirmation" => "required|max:12|string|same:password"
];
// エラーメッセージ
public $validateMessages = [

    "username.required" => "必須項目です。",
    "username.max:12" => "入力の上限を超えています。",
    "mail.required" => "必須項目です。",
    "mail.email" => "メールアドレス形式で入力してください。",
    "password.required" => "必須項目です。",
    "password-confirmation.same:password" => "入力したパスワードと不一致です",
    "password-confirmation.required" => "必須項目です。"
];

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();

    // バリデーションをインスタンス化
             $val = Validator::make(
               $data,
               $this->validateRules,
               $this->validateMessages
       );
             if($val->fails()){
            return redirect('/register')->withErrors($val)->withInput();
    }else{
            $this->create($data);
            return redirect('added');
        }}
        return view('auth.register');
    }

    // 新規登録後のページ
    public function added(Request $request){
        // $data = $request::all();
        // $name = PostRequest::All();
        $name = \DB::table('users')->orderByDESC("created_at")->first();
        // dd($name);
        return view('auth.added',compact('name'));
    }

}
