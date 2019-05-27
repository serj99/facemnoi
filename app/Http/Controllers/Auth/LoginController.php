<?php
namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:in_need_user')->except('logout');
        $this->middleware('guest:to_do_user')->except('logout');
    }
    
    public function showInNeedUserLoginForm()
    {
        return view('auth.login', ['url' => 'in_need_user']);
    }

    public function InNeedUserLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('in_need_user')->attempt(['email' => $request->email, 'password' => $request->password],
             $request->get('remember'))) {
            return redirect()->intended('/home/in_need_user');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function showToDoUserLoginForm()
    {
        return view('auth.login', ['url' => 'to_do_user']);
    }

    public function ToDoUserLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('to_do_user')->attempt(['email' => $request->email, 'password' => $request->password],
             $request->get('remember'))) {
            return redirect()->intended('/home/to_do_user');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}
