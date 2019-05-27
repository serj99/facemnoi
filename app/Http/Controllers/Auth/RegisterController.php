<?php

namespace App\Http\Controllers\Auth;

use App\InNeedUser;
use App\ToDoUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:in_need_user')->except('logout');
        $this->middleware('guest:to_do_user')->except('logout');
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
            'name' => ['required', 'string', 'max:255'],
            'mobile_phone' => ['required', 'string', 'min:8'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:in_need_users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createInNeedUser(Request $request)
    {
      $this->validator($request->all())->validate();
      
      $in_need_user = InNeedUser::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone_number' => $request['mobile_phone'],
          ]);
      return redirect()->intended('login/in_need_user');
    }

    protected function createToDoUser(Request $request)
    {
      $this->validator($request->all())->validate();
      
      $to_do_user = ToDoUser::create([
            'name' => $request['nametd'],
            'email' => $request['emailtd'],
            'password' => Hash::make($request['passwordtd']),
            'mobile_phone' => $request['mobile_phonetd'],
          ]);
      return redirect()->intended('login/to_do_user');
    }
   
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /*
    public function showToDoUserRegisterForm()
    {
        return view('auth.register');
    }
    */
}
