<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/email/verify';

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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email-r' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password-r' => ['required', 'string', 'min:8'],
            'name' => ['required', 'string'],
        ], [
            'email-r.required' => 'Email為必填',
            'email-r.email' => '請檢查Email格式',
            'email-r.unique' => 'Email已存在',
            'email-r.max' => '請檢查Email格式',
            'password-r.required' => '密碼為必填',
            'password-r.min' => '密碼至少為8個字',
            'name.required' => '姓名為必填',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email-r'],
            'password' => bcrypt($data['password-r']),
        ]);
    }
}
