@extends('layouts.default', [
    'title' => trans('common.user.user_menu_add'),
    'breadcrumbs' => [
        ['text' => trans("common.user.user_menu"), 'url' => route("users.index")],
        ['text' => trans("common.user.user_create")]
    ]
])

@section('plugin_styles')
    <link href="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}"
          rel="stylesheet" type="text/css"/>
@endsection

@section('user_menu', 'active open')
@section('user_create', 'active open')

@section('content')


    {!! Form::open(['route' => "users.store"]) !!}
    <div class="page-title">
        <h2>{{ trans('common.user.user_create') }}</h2>
    </div>

    <div class="row">
        <div class="col-sm-6 col-xs-12">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="username">{{ trans('common.user.username') }}&nbsp;<span class="required"
                                                                                         aria-required="true">*</span></label>
                    {{ Form::input('text', 'username', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="email">{{ trans('common.user.email') }}&nbsp;<span class="required"
                                                                                   aria-required="true">*</span></label>
                    {{ Form::input('email', 'email', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="role">{{ trans('common.user.role') }}&nbsp;<span class="required"
                                                                                 aria-required="true">*</span></label>
                    {{ Form::select('role', \App\Models\User::roles(), null, ['class' => 'form-control', 'id' => 'role']) }}
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="password">{{ trans('common.user.password') }}&nbsp;<span class="required"
                                                                                         aria-required="true">*</span></label>
                    {{ Form::input('password', 'password', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="password_confirmation">{{ trans('common.user.password_confirmation') }}&nbsp;<span
                                class="required" aria-required="true">*</span></label>
                    {{ Form::input('password', 'password_confirmation', null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
    </div>

    <hr/>

    <div class="row">
        <div class="col-sm-6 col-xs-12">
            <div class="form-group">
                {{ Form::label('fullname', trans('common.user.fullname')) }}
                {{ Form::input('text', 'fullname', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('gender', trans('common.user.gender')) }}
                {{ Form::select('gender', \App\Models\User::genders(), null, ['class' => 'form-control', 'id' => 'gender']) }}
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="form-group">
                {{ Form::label('birthday', trans('common.user.birthday')) }}
                {{ Form::input('text', 'birthday', null, ['class' => 'form-control', 'id' => 'mask_date', 'placeholder' => 'DD/MM/YYYY']) }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="form-actions">
                {{ Form::button('<i class="fa fa-check"></i>  ' . trans('common.submit'), ['type' => 'submit', 'class' => 'btn btn-primary', 'name' => 'submit', 'id' => 'submit']) }}
                {{ Form::button('<i class="fa fa-refresh"></i>   ' . trans('common.reset'), ['type' => 'reset', 'class' => 'btn btn-default', 'name' => 'reset', 'id' => 'reset']) }}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('page_plugin_scripts')
    <script src="{{ asset('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery.input-ip-address-control-1.0.min.js') }}" type="text/javascript"></script>
@endsection

@section('page_scripts')
    <script src="{{ asset('assets/pages/scripts/form-input-mask.min.js') }}" type="text/javascript"></script>
@endsection
