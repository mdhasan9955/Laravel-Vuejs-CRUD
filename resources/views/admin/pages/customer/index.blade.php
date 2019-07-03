@extends('admin.layout')
@section('title')
Admin panel | Admin User Add
@endsection()
@section('breadcrumb')
<section class="content-header">
    <h1>Customer list</h1>
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
                        <table id="fileData" class="table table-striped table-bordered table-hover" style="margin-bottom:5px;">
                            <thead>
                                <tr class="active">
                                    <th class="col-xs-1">Name</th> 
                                    <th class="col-xs-1">Email</th>
                                    <th class="col-xs-1">Phone Number</th>
                                    <th class="col-xs-1">Address</th>  
                                    <th class="col-xs-1">Action</th>  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customer as $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>{{ $data->address }}</td>  
                                    <td>                                         
                                        <a href="{{ Route('customer.delete',$data->id) }}" onclick="return confirm('Are you sure you want to Delete?')" data-toggle="modal" class="btn btn-danger">Delete</a>                          
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                        {{ $customer->links() }}
                    </div>
                    <div class="clearfix">dfgfg</div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection()