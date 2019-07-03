<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use redirect;
use Auth;
use Hash;

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
    protected $redirectTo = '/welcome';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    { 
        return view('auth.login');
    }
    public function login(Request $request){
        $this->validate($request, [
          'email' => 'required|email',
          'password' => 'required',
        ]);

        $user = User::where('email',$request->email)->first(); 
        if($user){            
            if(Hash::check($request->password,$user->password)){
                if($user->status ==1){
                  if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) { 
                      return redirect()->intended(route('welcome'));
                  }else{
                    session()->flash('error', 'Invalid Login');
                    return back();
                  }
                }else{
                  session()->flash('error', 'Inactive you! Please contact administrator');
                  return back();
                }
            }else{
                session()->flash('error', 'Invalid Password!');
                return back();
            }  
        }else{
          session()->flash('error', "Can't find You! (".$request->email.')');
          return back();
        } 
    } 
}
