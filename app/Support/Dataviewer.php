<?php

namespace App\Support; 
use Auth;
trait Dataviewer{  
    public function scopeAdvancedFilterAdmin($query){
        $request = app()->make('request');  
        return $query
        	->orderBy($request->column, $request->direction)
            ->where(function($query) use ($request) { 
                $query->where('name', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('email', 'LIKE', '%'.$request->search_input.'%') 
                ->orWhere('phone_no', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('type', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('status', 'LIKE', '%'.$request->search_input.'%');                     
            })->select('id','name','email','phone_no','type','status','avatar') 
            ->paginate($request->per_page); 
    }
    public function scopeAdvancedFilterCustomer($query){
        $request = app()->make('request');  
        return $query
            ->orderBy($request->column, $request->direction)
            ->where(function($query) use ($request) { 
                $query->where('company_name', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('phone_no', 'LIKE', '%'.$request->search_input.'%') 
                ->orWhere('mobile_no', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('expiry_date', 'LIKE', '%'.$request->search_input.'%') 
                ->orWhere('product_used', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('name', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('designation', 'LIKE', '%'.$request->search_input.'%') 
                ->orWhere('email', 'LIKE', '%'.$request->search_input.'%') 
                ->orWhere('contact_no', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('address', 'LIKE', '%'.$request->search_input.'%')  
                ->orWhere('status', 'LIKE', '%'.$request->search_input.'%');                     
            })->select('id','company_name','product_used','phone_no','mobile_no','expiry_date','name','designation','email','contact_no','address','status','avatar') 
            ->paginate($request->per_page); 
    }
    public function scopeAdvancedFilterDepartment($query){
        $request = app()->make('request');  
        return $query
            ->orderBy($request->column, $request->direction)
            ->where(function($query) use ($request) { 
                $query->where('name', 'LIKE', '%'.$request->search_input.'%') 
                ->orWhere('status', 'LIKE', '%'.$request->search_input.'%');                     
            })->select('id','name','status') 
            ->paginate($request->per_page); 
    }
    public function scopeAdvancedFilterCategory($query){
        $request = app()->make('request');  
        return $query
            ->orderBy($request->column, $request->direction) 
            ->where(function($query) use ($request) { 
                $query->where('name', 'LIKE', '%'.$request->search_input.'%')  
                ->orWhere('status', 'LIKE', '%'.$request->search_input.'%');                     
            })->select('id','name','status') 
            ->paginate($request->per_page); 
    }
    public function scopeAdvancedFilterExtension($query){
        $request = app()->make('request');  
        return $query
            ->orderBy($request->column, $request->direction) 
            ->where(function($query) use ($request) { 
                $query->where('name', 'LIKE', '%'.$request->search_input.'%')  
                ->orWhere('attachment', 'LIKE', '%'.$request->search_input.'%');                     
            })->select('id','name','attachment') 
            ->paginate($request->per_page); 
    } 
    public function scopeAdvancedFilterDownload($query){
        $request = app()->make('request');  
        return $query
            ->orderBy($request->column, $request->direction) 
            ->leftJoin('users', 'downloads.user_id', '=', 'users.id')
            ->leftJoin('categories', 'downloads.category_id', '=', 'categories.id')
            ->where(function($query) use ($request) { 
                $query->where('downloads.name', 'LIKE', '%'.$request->search_input.'%')  
                ->orWhere('downloads.attachment', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('categories.name', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('users.company_name', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('downloads.status', 'LIKE', '%'.$request->search_input.'%');
            })->select('downloads.id','categories.name as catname','users.company_name as username','downloads.attachment','downloads.name','downloads.status','downloads.description') 
            ->paginate($request->per_page); 
    }    
    public function scopeAdvancedFilterTicket($query){
        $request = app()->make('request');  
        if(Auth::user()->type == 'User'){
             return $query
            ->orderBy($request->column, $request->direction)
            ->leftJoin('department', 'department.id', '=', 'eticket.department_id')
            ->leftJoin('users', 'users.id', '=', 'eticket.user_id')
            ->leftJoin('priority', 'priority.id', '=', 'eticket.priority_id')
            ->leftJoin('admins', 'admins.id', '=', 'eticket.accepted_by') 
            ->where(function($query) use ($request) { 
                $query->where('department.name', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('users.name', 'LIKE', '%'.$request->search_input.'%')  
                ->orWhere('users.contact_no', 'LIKE', '%'.$request->search_input.'%') 
                ->orWhere('users.email', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('admins.email', 'LIKE', '%'.$request->search_input.'%')  
                ->orWhere('priority.title', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('subject', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('description', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('eticket.status', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('eticket.close', 'LIKE', '%'.$request->search_input.'%');
            })->where('accepted_by', Auth::user()->id)
            ->select('eticket.id','eticket.created_at', 'eticket.subject','priority.title','department.name as department','users.name as customer_name', 'users.contact_no as customer_phone', 'users.email as customer_email','admins.email as assigned','eticket.status as status','eticket.close') 
            ->paginate($request->per_page);  
        }else{
        return $query
        	->orderBy($request->column, $request->direction)
            ->leftJoin('department', 'department.id', '=', 'eticket.department_id')
            ->leftJoin('users', 'users.id', '=', 'eticket.user_id')
            ->leftJoin('priority', 'priority.id', '=', 'eticket.priority_id')
            ->leftJoin('admins', 'admins.id', '=', 'eticket.accepted_by') 
            ->where(function($query) use ($request) { 
                $query->where('department.name', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('users.name', 'LIKE', '%'.$request->search_input.'%')  
                ->orWhere('users.contact_no', 'LIKE', '%'.$request->search_input.'%') 
                ->orWhere('users.email', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('admins.email', 'LIKE', '%'.$request->search_input.'%')  
                ->orWhere('priority.title', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('subject', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('description', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('eticket.status', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('eticket.close', 'LIKE', '%'.$request->search_input.'%');
            })->select('eticket.id','eticket.created_at', 'eticket.subject','priority.title','department.name as department','users.name as customer_name', 'users.contact_no as customer_phone', 'users.email as customer_email','admins.email as assigned','eticket.status as status','eticket.close') 
            ->paginate($request->per_page); 
        }
    } 

    public function scopeAdvancedFilterCustomerTicket($query){
        $request = app()->make('request');  
        return $query
            ->orderBy($request->column, $request->direction)
            ->leftJoin('department', 'department.id', '=', 'eticket.department_id')
            ->leftJoin('users', 'users.id', '=', 'eticket.user_id')
            ->leftJoin('priority', 'priority.id', '=', 'eticket.priority_id')
            ->leftJoin('admins', 'admins.id', '=', 'eticket.accepted_by') 
            ->where('eticket.user_id', Auth::user()->id)
            ->where(function($query) use ($request) { 
                $query->where('department.name', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('users.name', 'LIKE', '%'.$request->search_input.'%') 
                ->orWhere('users.contact_no', 'LIKE', '%'.$request->search_input.'%') 
                ->orWhere('users.email', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('admins.email', 'LIKE', '%'.$request->search_input.'%')  
                ->orWhere('priority.title', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('subject', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('description', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('eticket.status', 'LIKE', '%'.$request->search_input.'%')
                ->orWhere('eticket.close', 'LIKE', '%'.$request->search_input.'%');
            })->select('eticket.id', 'eticket.subject','priority.title','department.name as department','users.name as customer_name', 'users.contact_no as customer_phone', 'users.email as customer_email','admins.email as assigned','eticket.status as status','eticket.close') 
            ->paginate($request->per_page); 
    }  
}