@extends('admin.layout')

@section('title')
Admin panel | Admin User Add
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
                            <user-data-viewer source='api/customers' title="Customer List" />  
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