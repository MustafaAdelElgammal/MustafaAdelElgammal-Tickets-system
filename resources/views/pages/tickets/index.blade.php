@extends('layouts.master')

@section('title')
    {{ trans('main_trans.tickets') }}
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('main_trans.tickets') }}</h4><span
                        class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                 {{ trans('main_trans.tickets_list') }}</span>
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
                <div class="card-header w3-border-bottom w3-border-light-gray">
                    <a href="{{ route('tickets.create') }}" class="btn btn-social btn-relief-primary">
                        <i class="fa fa-plus"></i> {{ trans('main_trans.add') }}
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-border default-datatable" id="table_id">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('main_trans.title') }}</th>
                                <th>{{ trans('main_trans.ticket_description') }}</th>
                                <th>{{ trans('main_trans.assigned_to') }}</th>
                                <th>{{ trans('main_trans.starts_in') }}</th>
                                <th>{{ trans('main_trans.end_in') }}</th>
                                <th>{{ trans('main_trans.status') }}</th>
                                <th>{{ trans('main_trans.notes') }}</th>
                                <th>{{ trans('main_trans.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{!! $row->id !!}</td>
                                    {{-- {{ dd(url('/')) }} --}}
                                    <td>{!! $row->name !!}</td>

                                    <td>{!! $row->description !!}</td>
                                    <td>{!! $row->user->name !!}</td>
                                    <td>{!! $row->start_in !!}</td>
                                    <td>{!! $row->end_in !!}</td>

                                    <td>
                                        @if ($row->status == 'مفعل')
                                            <span class="label text-success d-flex">
                                                <div class="dot-label bg-success ml-1"></div>{{ trans('main_trans.enabled') }}
                                            </span>
                                        @else
                                            <span class="label text-danger d-flex">
                                                <div class="dot-label bg-danger ml-1"></div>{{ trans('main_trans.disabled') }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>{!! $row->notes !!}</td>
                                    <td>
                                        <div>
                                            @can('user-list')
                                                <a class="btn btn-success btn-sm"
                                                   href="{{ route('tickets.show', $row->id) }}">{{ trans('main_trans.show') }}</a>

                                            @endcan
                                            @can('user-edit')
                                                <a class="btn btn-primary btn-sm"
                                                   href="{{ route('tickets.edit', $row->id) }}">{{ trans('main_trans.edit') }}</a>

                                            @endcan
                                            @can('user-delete')
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['tickets.destroy',
                                                                        $row->id], 'style' => 'display:inline']) !!}
                                                {!! Form::submit( trans('main_trans.delete') , ['class' => 'btn btn-danger btn-sm']) !!}
                                                {!! Form::close() !!}
                                            @endcan

                                        </div>
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