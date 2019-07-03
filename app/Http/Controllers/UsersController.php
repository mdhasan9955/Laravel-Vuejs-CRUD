<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;  
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Input;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Mail;
use Hash;
use Auth; 
use File; 
use AuthenticatesUsers;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(){
        $data = User::where('id',Auth::user()->id)->first();  
        return view('profile',compact('data')); 
    }
    public function update(Request $Request){
        $data = User::where('id',Auth::user()->id)->first();
        $User = User::where('id',Auth::user()->id)->first(); 
        $this->validate($Request, [
            'name' => 'required',
            'contact_no' => 'required',   
        ]); 

        if($Request->olpassword){ 
            $this->validate($Request, [
                'password' => 'string|min:6|required_with:confirmed|same:confirmed', 
            ]); 
            if(!Hash::check($Request->olpassword,$data->password)){ 
                session()->flash('error', 'Old password not match !'); 
                return redirect()->route('profile'); 
            }
            $User->password = Hash::make($Request->password);               
        }
        if ($Request->hasFile('attachment')) {
            $image = $Request->file('attachment'); 
            $imageName = strtotime(date('Y-m-d H:i:s')); 
            $fileExtension = $image->getClientOriginalExtension();
            $imgName = $imageName.'.'.$fileExtension;
            $uploadPath = 'profile-image/';
            $image->move($uploadPath,$imgName);
            $User->avatar = $imgName;   
        }
        //   `email`, `status`, `avatar`, `password`, 
        $User->company_name = $Request->company_name;
        $User->address = $Request->address;  
        $User->phone_no = $Request->phone_no; 
        $User->mobile_no = $Request->mobile_no; 
        $User->url = $Request->url;  
        $User->name = $Request->name; 
        $User->designation = $Request->designation; 
        $User->contact_no = $Request->contact_no; 
        $User->save();
        if(($Request->olpassword) && ($User->save())){
            Auth::guard()->logout();
            session()->flash('success', 'Profile update successfully !');
            return redirect()->route('login');
        }
        session()->flash('success', 'Profile update successfully !');
        return redirect()->route('profile'); 
    } 
}
