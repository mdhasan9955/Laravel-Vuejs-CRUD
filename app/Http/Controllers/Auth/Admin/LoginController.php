<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Notifications\VerifyRegistration; 
use App\Models\Admin;
use Illuminate\Http\Request;
use redirect;
use Auth;
use Hash;


class LoginController extends Controller
{ 

  use AuthenticatesUsers;

  /**
  * Where to redirect users after login.
  *
  * @var string
  */
  protected $redirectTo = '/admin';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  public function showLoginForm(){
    return view('auth.admin.login');
  }
 
  public function login(Request $request){
    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required',
    ]);

    $admin = Admin::where('email',$request->email)->first();  
    if($admin){
      if(Hash::check($request->password,$admin->password)){
        if($admin->status ==1){
          if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) { 
            return redirect()->intended(route('admin.index'));
          }else{
            session()->flash('error', 'Invalid Login');
            return back();
          }
        }else{
          session()->flash('error', 'Inactive you! Please contact administrator');
          return back();
        }
      }else{
        session()->flash('error', 'Invalid Password');
        return back();
      } 
    }else{
      session()->flash('error', "Can't find You! (".$request->email.')');
      return back();
    } 
  }
  public function logout(Request $request) {
    $this->guard()->logout();
    $request->session()->invalidate();
    return redirect()->route('admin.login');
  }

}
