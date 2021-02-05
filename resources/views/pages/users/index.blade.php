@extends('layouts.master')
@section('title') 
{{ trans('main_trans.users') }}
@endsection 

@section('content')

<div class="card">
    @can('user-create')
    <div class="card-header w3-border-bottom w3-border-light-gray"  >
        <a href="{{route('users.create')}}" class="btn btn-social btn-relief-primary">
            <i class="fa fa-plus"></i> {{ trans('main_trans.add') }}
        </a>  
    </div>
    @endcan
    <div class="card-body">
        <div class="table-responsive">
            @include('pages.users.table')
        </div>
    </div>
</div>

@endsection

