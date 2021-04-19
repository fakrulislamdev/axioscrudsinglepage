@extends('admin.master')

@section('admin_content')
@section('title')
Dashboard
@stop
@section('master_content')
<div class="page-head">
    <h4 class="my-2"> Admin Dashboard</h4>
</div>   
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Wellcome') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as SuperAdmin!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
     

@endsection
