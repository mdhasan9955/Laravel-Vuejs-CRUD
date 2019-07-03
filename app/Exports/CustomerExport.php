<?php 

namespace App\Exports; 

use App\Models\Admin; 
use Maatwebsite\Excel\Concerns\FromCollection;
use DB; 
class CustomerExport implements FromCollection

{ 
    public function collection() {
    	//$data = Admin::all(); 
    	$users_row = array();
    	$users_row[0] = array('company_name' => 'company name','address' => 'address' ,'phone_no' => 'phone no'); 

    	$users_row = DB::table('admins')
                     ->select(DB::raw('id, name, email, phone_no, created_at'))  
                     ->get(); 

        return $users_row;

    }

}



