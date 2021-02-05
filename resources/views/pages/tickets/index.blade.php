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

                                    <td @if($row->status == 'مفعل') class="btn btn-success"
                                        @elseif($row->status == 'غير مفعل') class="btn btn-danger"
                                        @else class="btn btn-dark" @endif>
                                        @can('ticket-edit')
                                        <button type="button" class="" data-toggle="modal"
                                                data-target="#modal-{{ $row->id }}">
                                            @if($row->status == 'مفعل') {{ trans('main_trans.enabled') }}
                                            @elseif($row->status == 'غير مفعل'){{ trans('main_trans.disabled') }}
                                            @else {{ trans('main_trans.closed') }} @endif

                                        </button>
                                        <div class="modal fade" id="modal-{{ $row->id }}" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="exampleModalLabel">{{ trans('main_trans.update_status') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {!! Form::open(['method' => 'PUT', 'route' => ['updateStatus', $row->id], 'style' => 'display:inline']) !!}
                                                        <select name="status" id="select-beast"
                                                                class="status form-control">
                                                            @can('ticket-open')
                                                            <option value="مفعل"
                                                                    @if($row->status == 'مفعل') selected
                                                                    class="btn btn-success" @endif >{{ trans('main_trans.enabled') }}</option>
                                                            @endcan
                                                            @can('ticket-reopen')
                                                            <option value="غير مفعل"
                                                                    @if($row->status == 'غير مفعل') selected
                                                                    class="btn btn-danger" @endif>{{ trans('main_trans.disabled') }}</option>
                                                             @endcan
                                                             @can('ticket-close')
                                                            <option value="مغلقة"
                                                                    @if($row->status == 'مغلقة') selected
                                                                    class="btn btn-dark" @endif >{{ trans('main_trans.closed') }}</option>
                                                             @endcan
                                                        </select>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('main_trans.close') }}</button>

                                                            {!! Form::submit( trans('main_trans.save') , ['class' => 'btn btn-success']) !!}
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                    <div class="modal-footer">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endcan
                                    </td>
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


@endsection
@section('js')


    <script>
        $(document).ready(function () {
            $("select.status").change(function () {
                var selectedCountry = $(this).children("option:selected").val();
                console.log(selectedCountry);
            });
        });
    </script>
@endsection