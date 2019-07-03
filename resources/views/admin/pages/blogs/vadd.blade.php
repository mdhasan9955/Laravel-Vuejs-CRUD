@extends('admin.layout')
@section('title')
Admin panel | Admin User Add
@endsection()
@section('breadcrumb')
<section class="content-header">
    <h1>Customer list</h1>
    <a class="goBack add_goback" href="{{Route('admin.customer.add')}}">Add New</a> 
    <a class="goBack" href="{{Route('admin.customer.excel')}}">Export  <i class="fa fa-download" aria-hidden="true"></i></a>
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
                <div class="box-body">
                    <div class="form-group">
                        @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <p><i class="icon fa fa-check"></i>{{ Session::get('success') }}</p>       
                        </div> 
                        @endif 
                        @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <p><i class="icon fa fa-ban"></i>{{ Session::get('error') }} </p>       
                        </div>
                        @endif 
                    </div> 
                    <div class="table-responsive">
                        <div id="app">
                            <create-post-component source='api/posts' title="Posts List" />  
                        </div>  
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</section>  
<script type="text/javascript" src="{{asset('public/js/app.js')}}"></script>
@endsection()