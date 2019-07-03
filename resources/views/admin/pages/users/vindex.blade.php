@extends('admin.layout')
@section('title')
Admin panel | Admin User Add
@endsection()
@section('breadcrumb')
<section class="content-header">
    <h1>User list</h1>
    <a class="goBack add_goback" href="{{Route('admin.user.add')}}">Add New user</a>
    <a class="goBack" href="{{Route('admin.user.export')}}">Export <i class="fa fa-download" aria-hidden="true"></i></a>
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
                    <div class="table-responsive">
                        <div id="app">
                            <admin-data-viewer source='api/users' title="Admin List" />
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