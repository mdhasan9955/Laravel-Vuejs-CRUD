<?php

  

namespace App\Exports;

  

use App\Models\User;

use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
  

class UsersExport implements FromCollection

{ 
    public function collection() {
    	//$data = User::all(); 
    	$users_row = array();
    	$users_row[0] = array('company_name' => 'company name','address' => 'address' ,'phone_no' => 'phone no'); 
    	$users_row = DB::table('users')
                     ->select(DB::raw('company_name, address, phone_no, mobile_no, url, name, designation, contact_no, email, created_at'))  
                     ->get();   
        // foreach ($users_row as $key => $value) {
        // 	$users[] = array(
        // 		'company_name'=> $value->company_name,
        // 		'address' => $value->address,
        // 		'phone_no' => $value->phone_no,
        // 	);
        // }   
        return $users_row;

    }

}