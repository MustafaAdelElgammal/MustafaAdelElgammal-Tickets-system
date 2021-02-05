<div class="row">
    <div class="col-lg-12 col-md-12">

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

        <div class="card">
            <div class="card-body">

                <div class="">
                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label>{{ trans('main_trans.username') }}: <span class="tx-danger">*</span></label>
                            {!! Form::text('name', null, array('class' => 'form-control','required')) !!}
                        </div>

                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label>{{ trans('main_trans.email') }}: <span class="tx-danger">*</span></label>
                            {!! Form::text('email', null, array('class' => 'form-control','required')) !!}
                        </div>
                    </div>

                </div>

                <div class="row mg-b-20">
                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label>{{ trans('main_trans.password') }}: <span class="tx-danger">*</span></label>
                        {!! Form::password('password', array('class' => 'form-control','required')) !!}
                    </div>

                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label>{{ trans('main_trans.confirm-password') }}: <span class="tx-danger">*</span></label>
                        {!! Form::password('confirm-password', array('class' => 'form-control','required')) !!}
                    </div>
                </div>

                <div class="row row-sm mg-b-20">
                    <div class="col-lg-6">
                        <label class="form-label">{{ trans('main_trans.user-status') }}</label>
                        <select name="status" id="select-beast" class="form-control">
                            <option value="مفعل" @if($user->status == 'مفعل') selected @endif>{{ trans('main_trans.enabled') }}</option>
                            <option value="غير مفعل" @if($user->status == 'غير مفعل') selected @endif>{{ trans('main_trans.disabled') }}</option>
                        </select>
                    </div>
                </div>

                <div class="row mg-b-20">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ trans('main_trans.user-role') }}</strong>
                            {!! Form::select('roles_name[]', $roles,$userRole, array('class' => 'form-control','multiple'))
                            !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

