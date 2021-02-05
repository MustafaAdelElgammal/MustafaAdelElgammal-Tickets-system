<table class="table table-border default-datatable" id="table_id">
    <thead>
    <tr>
        <th> ID</th>
        <th> {{ trans('main_trans.image') }} </th>
        <th> {{trans('main_trans.full_name') }} </th>
        <th>{{ trans('main_trans.email') }}</th>
        <th> حالة المستخدم</th>
        <th> {{ trans('main_trans.role') }}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $row)
        <tr>
            <td>{!! $row->id !!}</td>
            {{-- {{ dd(url('/')) }} --}}
            <td>
                @if($row->image != null)
                    <img class="round" style="width: 40px; height: 40px" src="{{url('/').'/public/'. $row->image}}"
                         alt="">
                @else
                    <img class="round" style="width: 40px; height: 40px" src="{{url('/').'/assets/images/user.png'}}"
                         alt="">
                @endif
            </td>
            <td>{!! $row->name !!}</td>
            <td>{!! $row->email !!}</td>
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
            <td>{!! __(optional($row->roles()->first())->name) !!}</td>
            <td>


                <div>
                    @can('user-list')
                        <a class="btn btn-success btn-sm"
                           href="{{ route('users.show', $row->id) }}">{{ trans('main_trans.show') }}</a>

                    @endcan
                    @can('user-edit')
                        <a class="btn btn-primary btn-sm"
                           href="{{ route('users.edit', $row->id) }}">{{ trans('main_trans.edit') }}</a>

                    @endcan
                    @can('user-delete')
                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy',
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