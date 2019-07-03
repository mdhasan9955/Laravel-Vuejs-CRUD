<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin; 
use App\Models\User;  
use Illuminate\Support\Facades\Input;
use Hash;
use Auth; 
use File;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Mail;
use App\Exports\CustomerExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;


class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    } 
    public function index(){   
        return view('admin.pages.dashboard', compact('data', 'statusVal')); 
    }
    public function export(){ 
        return Excel::download(new CustomerExport, 'users.csv'); 
        
    }
    public function showAdmins(){    
        $admin = Admin::orderBy('id','DESC')->paginate(15);
        return view('admin.pages.users.vindex', compact('admin'));   
    } 
    public function adminIndex(){  
        $model = Admin::AdvancedFilterAdmin(10);
        $columns  = Admin::$columns;
        $theads  = Admin::$theads;  
        $authData  = Auth::user(); 
        return response()->json([
            'model' => $model,
            'columns' => $columns, 
            'theads' => $theads, 
            'authData' => $authData, 
        ]); 
    } 
     
    public function addUser(){     
        return view('admin.pages.users.add' );
    } 
    public function create_user(Request $Request) { 
        $this->validate($Request, [
            'name' => 'required',
            'phone_no' => 'required',
            'email' => 'required|string|email|max:100|unique:admins', 
            'password' => 'string|min:6|required_with:confirmed|same:confirmed',
            'confirmed' => 'min:6',
            'status' => 'required',
        ]); 
        $Admin = new Admin();         
        $Admin->name = $Request->name; 
        $Admin->phone_no = $Request->phone_no; 
        $Admin->email = $Request->email; 
        $Admin->status  = $Request->status;
        $Admin->type  = $Request->type;
        $Admin->password = Hash::make($Request->password);
        $Admin->remember_token  = str_random(50);
        $Admin->save();
        $data = array(
            'name' => $Request->name,
            'phone_no' => $Request->phone_no,
            'email'  => $Request->email,
            'type'  => $Request->type, 
            'password'  => $Request->password, 
            'created_at' => date('Y-m-d h:i:s'),
            );
            $type = $Request->type; 
        $email = $Request->email;
        Mail::send('email-template.admin.admin_email', $data, function($message) use ($email,$type){ 
            $message->to($email, 'E-ticket')->cc([env('MAIL_FROM_ADDRESS')])->subject
                ('Congratulations! you are new '.$type.' in -');
            $message->from(env('MAIL_FROM_ADDRESS'),'E-ticket');
        });
        session()->flash('success', 'A new admin user has added successfully !!');
        return redirect()->route('admin.user.add');          
    } 
    public function adminApiData(){
        $data = Admin::all();
    }

    public function edit($id){
        $data = Admin::where('id',$id)->first();  
        return view('admin.pages.users.edit',compact('data')); 
    }
    public function store(Request $Request){
        $data = Admin::where('id', $Request->adminid)->first();
        $admin = Admin::where('id', $Request->adminid)->first(); 
        $this->validate($Request, [
            'name' => 'required',
            'phone_no' => 'required',   
        ]);        
        if($Request->password){ 
            $this->validate($Request, [
                'password' => 'string|min:6|required_with:confirmed|same:confirmed', 
            ]); 
            $admin->password = Hash::make($Request->password);               
        } 

        if ($Request->hasFile('attachment')) {
            $image = $Request->file('attachment'); 
            $imageName = strtotime(date('Y-m-d H:i:s')); 
            $fileExtension = $image->getClientOriginalExtension();
            $imgName = $imageName.'.'.$fileExtension;
            $uploadPath = 'profile-image/';
            $image->move($uploadPath,$imgName);
            $admin->avatar = $imgName;   
        }        
        $admin->phone_no = $Request->phone_no;  
        $admin->name = $Request->name; 
        $admin->status = $Request->status;  
        $admin->save();      
        session()->flash('success', 'User update successfully !');
        return redirect()->route('admin.users.index'); 
    }
    public function profile(){
        $data = Admin::where('id',Auth::user()->id)->first();  
        return view('admin.pages.users.profile',compact('data')); 
    }
    public function update(Request $Request){
        $data = Admin::where('id',Auth::user()->id)->first();
        $admin = Admin::where('id', Auth::user()->id)->first(); 
        $this->validate($Request, [
            'name' => 'required',
            'phone_no' => 'required',   
        ]); 
               
        if($Request->olpassword){ 
            $this->validate($Request, [
                'password' => 'string|min:6|required_with:confirmed|same:confirmed', 
            ]); 
            if(!Hash::check($Request->olpassword,$data->password)){ 
                session()->flash('error', 'Old password not match !'); 
                return redirect()->route('admin.profile'); 
            }
            $admin->password = Hash::make($Request->password);               
        } 
        if ($Request->hasFile('attachment')) {
            $image = $Request->file('attachment'); 
            $imageName = strtotime(date('Y-m-d H:i:s')); 
            $fileExtension = $image->getClientOriginalExtension();
            $imgName = $imageName.'.'.$fileExtension;
            $uploadPath = 'profile-image/';
            $image->move($uploadPath,$imgName);
            $admin->avatar = $imgName;   
        }
        
        $admin->phone_no = $Request->phone_no;  
        $admin->name = $Request->name; 
        $admin->save();
        if(($Request->olpassword) && ($admin->save())){
            auth('admin')->logout();
            session()->flash('success', 'Profile update successfully !');
            return redirect()->route('admin.login');
        }      
        session()->flash('success', 'Profile update successfully !');
        return redirect()->route('admin.profile'); 
    }
    public function delete($id){
        if($id==Auth::user()->id){
            session()->flash('error', 'You can not delete it, because this is you !');
            return redirect()->route('admin.users.index'); 
        }else{
            $admin =Admin::where('id', $id)->first();   
            $admin->delete(); 
            session()->flash('success', 'A admin user has deleted !');
            return redirect()->route('admin.users.index');
        }
    }
    
}
