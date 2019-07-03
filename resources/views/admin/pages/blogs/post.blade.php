@extends('admin.layout')
@section('title')
Admin panel | Admin User Add
@endsection()
@section('breadcrumb')
<section class="content-header">
    <h1>Customer Add</h1>
    <button class="goBack" onclick="goBack()">Go Back</button> 
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Add</a></li> 
    </ol>
</section>
@endsection()
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary"> 
                <div class="box-body">
                     <div id="app">
                      <example-component></example-component>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>
 
@endsection()