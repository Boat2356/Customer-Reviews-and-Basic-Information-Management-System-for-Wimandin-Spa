<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

    

    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }
    
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|exists:users,' . $this->username() . ',status,A',
            'password' => 'required',
        ], [
            $this->username() . '.exists' => 'ไม่พบข้อมูลในระบบ หรือ บัญชีของคุณถูกระงับการใช้งาน', // ข้อความแจ้งเตือนรวม
        ]);
        
    }
    


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    #protected $redirectTo = '/home';
    protected $redirectTo = '/homeUser';

    protected function authenticated(Request $request, $user)
    {
        if($user->isAdmin()){
            return redirect()->route('Admindashboard');
        }else{
            return redirect()->route('homeUser');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->loggedOut($request) ?: redirect('homeUser');
    }
}
