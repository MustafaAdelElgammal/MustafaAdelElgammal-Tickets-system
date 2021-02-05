@extends('layouts.master')

@section('title')
    {{ trans('main_trans.users-roles') }}
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('main_trans.users') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                 {{ trans('main_trans.users-roles') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header w3-border-bottom w3-border-light-gray"  >
                    <a href="{{ route('roles.create') }}" class="btn btn-social btn-relief-primary">
                        <i class="fa fa-plus"></i> {{ trans('main_trans.add') }}
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap table-hover ">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('main_trans.name') }}</th>
                                <th>{{ trans('main_trans.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @can('role-list')
                                            <a class="btn btn-success btn-sm"
                                               href="{{ route('roles.show', $role->id) }}">{{ trans('main_trans.show') }}</a>
                                        @endcan

                                        @can('role-edit')
                                            <a class="btn btn-primary btn-sm"
                                               href="{{ route('roles.edit', $role->id) }}">{{ trans('main_trans.edit') }}</a>
                                        @endcan
                                        @if ($role->name !== 'Super Admin')
                                            @can('role-delete')
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy',
                                                $role->id], 'style' => 'display:inline']) !!}
                                                {!! Form::submit( trans('main_trans.delete') , ['class' => 'btn btn-danger btn-sm']) !!}
                                                {!! Form::close() !!}
                                            @endcan
                                        @endif


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection