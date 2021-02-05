@extends('layouts.master')

@section('content')


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ trans('main_trans.name') }}:</strong>
                {{ $data->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ trans('main_trans.ticket_description') }}:</strong>
                {{ $data->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ trans('main_trans.ticket_status') }}:</strong>
                {{ $data->status }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ trans('main_trans.select_user') }}</strong>
                {{ $data->user->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ trans('main_trans.starts_in') }}:</strong>
                {{ $data->start_in }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ trans('main_trans.end_in') }}:</strong>
                {{ $data->end_in }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ trans('main_trans.notes') }}:</strong>
                {{ $data->notes }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tickets.index') }}"> Back</a>
            </div>
        </div>
    </div>

@endsection