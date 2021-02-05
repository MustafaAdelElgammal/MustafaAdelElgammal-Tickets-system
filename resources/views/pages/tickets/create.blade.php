@extends('layouts.master')

@section('title')
    {{ trans('main_trans.ticket_add') }}

@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('main_trans.tickets') }}</h4><span
                        class="text-muted mt-1 tx-13 mr-2 mb-0">/
                {{ trans('main_trans.ticket_add') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>خطا</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif




    {!! Form::open(array('route' => 'tickets.store','method'=>'POST')) !!}
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        <div class="col-xs-7 col-sm-7 col-md-7">
                            <div class="form-group">
                                <p>{{ trans('main_trans.ticket_name') }} :</p>
                                {!! Form::text('name', null, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-7 col-sm-7 col-md-7">
                            <div class="form-group">
                                <p>{{ trans('main_trans.ticket_description') }} :</p>
                                {!! Form::textarea('description', null, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-7 col-sm-7 col-md-7">
                            <div class="form-group">
                                <label class="form-label">{{ trans('main_trans.ticket_status') }}</label>
                                <select name="status" id="select-beast" class="form-control">
                                    <option value="مفعل">{{ trans('main_trans.enabled') }}</option>
                                    <option value="غير مفعل">{{ trans('main_trans.disabled') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-7 col-sm-7 col-md-7">
                            <div class="form-group">
                                <label class="label-r" for="user_id">{{ trans('main_trans.select_user') }}</label>
                                {!! Form::select('user_id',App\User::pluck('name','id'),null,['required'=>'required','class'=>'form-control','id'=>'customSelect'])!!}
                                @error('user_id')
                                <span class="text-danger"> {!! $message !!}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-7">
                        <div class="form-group">
                            <label class="label-r" for="user_id">{{ trans('main_trans.starts_in') }}</label>
                            <input type="datetime-local" id="start_in" name="start_in">
                            @error('starts_in')
                            <span class="text-danger"> {!! $message !!}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label-r" for="user_id">{{ trans('main_trans.end_in') }}</label>
                        <input type="datetime-local" id="end_in" name="end_in">
                        @error('end_in')
                        <span class="text-danger"> {!! $message !!}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7">
                    <div class="form-group">
                        <p>{{ trans('main_trans.notes') }} :</p>
                        {!! Form::textarea('notes', null, array('class' => 'form-control')) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">{{ trans('main_trans.save') }}</button>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@endsection
