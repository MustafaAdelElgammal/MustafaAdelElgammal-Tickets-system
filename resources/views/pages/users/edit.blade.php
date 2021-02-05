@extends('layouts.master')
@section('title')
    {{ trans('main_trans.users') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>{{ trans('main_trans.edit') }}</h3>
                </div>
                <div class="card-body">
                    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                    @include('pages.users.form')
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button class="btn btn-primary pd-x-20" type="submit">{{ trans('main_trans.save') }}</button>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection
