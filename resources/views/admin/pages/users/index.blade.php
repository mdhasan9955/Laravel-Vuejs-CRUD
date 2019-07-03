@extends('admin.layout')
@section('title')
Admin panel | Admin User Add
@endsection()
@section('breadcrumb')
<section class="content-header">
    <h1>User list</h1>
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
                    <h3 class="box-title"></h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <p><i class="icon fa fa-check"></i>{{ Session::get('success') }}</p>       
                            </div> 
                        @endif
                        @if(Session::has('error'))
                             <div class="alert alert-danger alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <p><i class="icon fa fa-ban"></i>{{ Session::get('error') }}</p>       
                            </div>  
                        @endif 
                        <table id="fileData" class="table table-striped table-bordered table-hover" style="margin-bottom:5px;">
                            <thead>
                                <tr class="active">
                                    <th class="col-xs-1">Name</th> 
                                    <th class="col-xs-1">Email</th>
                                    <th class="col-xs-1">Phone Number</th>
                                    <th class="col-xs-1">Admin Type</th>
                                    <th class="col-xs-1">Status</th>
                                    @if(Auth::user()->type == 'Super Admin')
                                    <th class="col-xs-1">Active</th> 
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admin as $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->phone_no }}</td> 
                                    <td>@if($data->status =='1')         
                                        Active         
                                        @else
                                        Inactive    
                                        @endif
                                    </td>
                                    <td>{{ $data->type }} </td>
                                    @if(Auth::user()->type == 'Super Admin')
                                    <td>                                         
                                        <a href="{{ Route('admin.delete',$data->id) }}" onclick="return confirm('Are you sure you want to Delete?')" data-toggle="modal" class="btn btn-danger">Delete</a>                          
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                         {{ $admin->links() }}
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection()