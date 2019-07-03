@extends('admin.layout')
@section('title')
Admin panel | Admin User Add
@endsection()
@section('breadcrumb')
<section class="content-header">
    <h1>Customer data</h1>
    <button class="goBack" onclick="goBack()">Go Back</button> 
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> List</a></li> 
    </ol>
</section>
@endsection()
@section('content') 

<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Company Information</h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-6">  
                        <table id="fileData" class="table table-striped table-bordered " style="margin-bottom:5px;">
                            <thead>
                                <tr>
                                    <th >Company Name</th> 
                                    <td>{{ $customer->company_name }}</td>
                                </tr>
                                <tr>
                                    <th >Address</th> 
                                    <td>{{ $customer->address }}</td>
                                </tr>
                                <tr>
                                    <th >C.Phone Number</th> 
                                    <td>{{ $customer->phone_no }}</td>
                                </tr> 
                                <tr>
                                    <th >C.Mobile Number</th> 
                                    <td>{{ $customer->mobile_no }}</td>
                                </tr> 
                                <tr>
                                    <th >Web URL</th> 
                                    <td>{{ $customer->url }}</td>
                                </tr>
                                <tr>
                                    <th >Product used</th> 
                                    <td>{{ $customer->product_used }}</td>
                                </tr> 
                                <tr>
                                    <th colspan="2">Contact person</th>  
                                </tr> 
                                <tr>
                                    <th >Name</th> 
                                    <td>{{ $customer->name }}</td>
                                </tr> 
                                <tr>
                                    <th >Designation</th> 
                                    <td>{{ $customer->designation }}</td>
                                </tr> 
                                <tr>
                                    <th >Contact Number</th> 
                                    <td>{{ $customer->contact_no }}</td>
                                </tr>
                                <tr>
                                    <th >Contact email</th> 
                                    <td>{{ $customer->email }}</td>
                                </tr>  
                            </thead> 
                        </table> 
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

    </div>
</section> 
@endsection()