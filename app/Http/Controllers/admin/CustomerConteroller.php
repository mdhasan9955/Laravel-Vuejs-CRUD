<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\User;  
use Illuminate\Support\Facades\Input;
use Hash;
use Auth; 
use File;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Mail; 
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class CustomerConteroller extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }
    public function excel(){ 
        return Excel::download(new UsersExport, 'customer.csv'); 
    } 
    public function index(){ 
        $customer = User::orderBy('id','DESC')->paginate(15);  
        return view('admin.pages.customer.vindex', compact('customer'));         
    }      
    public function customerIndex(){  
        $model = User::AdvancedFilterCustomer(10);
        $columns  = User::$columns;
        $theads  = User::$theads; 
        $authData  = Auth::user(); 
        return response()->json([
            'model' => $model,
            'columns' => $columns, 
            'theads' => $theads, 
            'authData' => $authData, 
        ]); 
    }
    public function add(){     
        return view('admin.pages.customer.add' );
    }
    public function show($id){
        $customer = User::where('id', $id)->first();
        return view('admin.pages.customer.show',compact('customer') );
    }
    public function create(Request $Request) { 
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'; 
        if($Request->url){
            $this->validate($Request, [ 
                'url' => 'regex:' . $regex, 
            ]);
        }
        $this->validate($Request, [
            'company_name' => 'required',
            'name'      => 'required',
            'phone_no'  => 'required',
            'mobile_no' => 'required', 
            'product_used' => 'required',
            'designation' => 'required',
            'contact_no' => 'required',
            'expiry_date' => 'required',
            'email' => 'required|string|email|max:100|unique:users', 
            'password' => 'string|min:6|required_with:confirmed|same:confirmed',
            'confirmed' => 'min:6',
            'status' => 'required',
        ]); 
        $User = new User();     
        if ($Request->hasFile('attachment')) {
            $image = $Request->file('attachment'); 
            $imageName = str_replace(' ','_',$Request->company_name); 
            $fileExtension = $image->getClientOriginalExtension();
            $imgName = $imageName.'.'.$fileExtension;
            $uploadPath = 'profile-image/';
            $image->move($uploadPath,$imgName);
            $User->avatar = $imgName;   
        }    
        $User->company_name = $Request->company_name; 
        $User->address = $Request->address; 
        $User->phone_no = $Request->phone_no; 
        $User->mobile_no = $Request->mobile_no; 
        $User->url = $Request->url; 
        $User->product_used = $Request->product_used; 
        $User->designation = $Request->designation; 
        $User->name = $Request->name; 
        $User->contact_no = $Request->contact_no; 
        $User->email = $Request->email; 
        $User->status  = $Request->status; 
        $User->expiry_date  = $Request->expiry_date; 
        $User->password = Hash::make($Request->password);
        $User->remember_token  = str_random(50);
        $User->save();
        $data = array(
            'company_name' => $Request->company_name,
            'address' => $Request->address,
            'phone_no' => $Request->phone_no,
            'mobile_no' => $Request->mobile_no,
            'url' => $Request->url,
            'product_used' => $Request->product_used,
            'designation' => $Request->designation,
            'contact_no' => $Request->contact_no,
            'email'  => $Request->email, 
            'password'  => $Request->password, 
            'created_at' => date('Y-m-d h:i:s'),
            ); 
        $email = $Request->email;
        Mail::send('email-template.admin.customer_email', $data, function($message) use ($email){ 
            $message->to($email, 'E-ticket')->cc([env('MAIL_FROM_ADDRESS')])->subject
                ('Login information');
            $message->from(env('MAIL_FROM_ADDRESS'),'E-ticket');
        });
        session()->flash('success', 'A new customer has added successfully !!');
        return redirect()->route('admin.customer.index');          
    }
    public function edit($id){    
        $user = User::where('id',$id)->first(); 
        return view('admin.pages.customer.edit',compact('user'));
    }
    public function update(Request $Request) { 
        $User = User::where('id',$Request->customer_id)->first();
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'; 
        if($Request->url){
            $this->validate($Request, [ 
                'url' => 'regex:' . $regex, 
            ]);
        }
        $this->validate($Request, [
            'company_name' => 'required',
            'name' => 'required',
            'phone_no' => 'required',
            'mobile_no' => 'required', 
            'product_used' => 'required',
            'designation' => 'required',
            'contact_no' => 'required',  
            'status' => 'required',
            'expiry_date' => 'required',
        ]); 
        if($Request->password){ 
            $this->validate($Request, [
                'password' => 'string|min:6|required_with:confirmed|same:confirmed', 
            ]);  
            $User->password = Hash::make($Request->password);               
        }
        if ($Request->hasFile('attachment')) {
            $image = $Request->file('attachment'); 
            $imageName = str_replace(' ','_',$Request->company_name); 
            $fileExtension = $image->getClientOriginalExtension();
            $imgName = $imageName.'.'.$fileExtension;
            $uploadPath = 'profile-image/';
            $image->move($uploadPath,$imgName);
            $User->avatar = $imgName;   
        }          
        $User->company_name = $Request->company_name; 
        $User->address = $Request->address; 
        $User->phone_no = $Request->phone_no; 
        $User->mobile_no = $Request->mobile_no; 
        $User->url = $Request->url; 
        $User->product_used = $Request->product_used;
        $User->name = $Request->name;  
        $User->designation = $Request->designation; 
        $User->contact_no = $Request->contact_no;  
        $User->status  = $Request->status;   
        $User->expiry_date  = $Request->expiry_date;
        $User->save();  
        session()->flash('success', 'A customer user update successfully!');
        return redirect()->route('admin.customer.index');          
    }
    public function delete($id){  
        $user = User::where('id', $id)->first();     
        if(!$user){
            session()->flash('error', 'Access denied');
            return redirect()->route('admin.customer.index');
        } 
        User::where('id', $id)->delete();  
        session()->flash('success', 'A customer user has deleted !');
        return redirect()->route('admin.customer.index'); 
    }
}
