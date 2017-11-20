@extends('layouts.default', [
    'title' => trans('common.user.profile_update'),
    'breadcrumbs' => [
        ['text' => trans("common.user.user_menu"), 'url' => route("users.index")],
        ['text' => trans("common.user.update_profile")]
    ]
])

@section('plugin_styles')
    <link href="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('user_menu', 'active open')

@section('content')

    {!! Form::open(['route' => ['profile.update', $user->id], 'method' => 'PUT', 'role' => 'form', 'files' => true]) !!}
    <div class="page-title">
        <h2>{{ trans('common.user.update_profile') }}</h2>
    </div>

    <div class="row">
        <div class="col-sm-6 col-xs-12">
            <div class="text-center">
                @if($user->avatar)
                    <img src="{{ asset('uploads/avatar/' . $user->avatar) }}" height="250" width="250" alt="{{ $user->fullname }}" class="mt-5 mb-5" id="avatar">
                @else
                    <img src="{{ asset('uploads/avatar/user.png') }}" height="250" width="250"  alt="{{ $user->fullname }}" class="mt-5 mb-5" id="avatar">
                @endif
                <div class="input-group" style="width: 100%">
                    <div class="clearfix margin-bottom-10"> </div>
                    {{ Form::file('avatar', ['id' => 'input-avatar', 'onchange' => 'preview_image(event)', 'style' => 'display: inline']) }}
                    {{ Form::label('avatar', 'Change Avatar', ['style' => 'display: block;']) }}
                </div>


            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="username">{{ trans('common.user.username') }}&nbsp;<span class="required" aria-required="true">*</span></label>
                    {{ Form::input('text', 'username', $user->username, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="email">{{ trans('common.user.email') }}&nbsp;<span class="required" aria-required="true">*</span></label>
                    {{ Form::input('email', 'email', $user->email, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {{ Form::label('fullname', trans('common.user.fullname')) }}
                    {{ Form::input('text', 'fullname', $user->fullname, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {{ Form::label('gender', trans('common.user.gender')) }}
                    {{ Form::select('gender', \App\Models\User::genders(), $user->gender, ['class' => 'form-control', 'id' => 'gender']) }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {{ Form::label('birthday', trans('common.user.birthday')) }}
                    {{ Form::input('text', 'birthday', $user->birthday ? \Carbon\Carbon::createFromFormat('Y-m-d', $user->birthday)->format('dmY') : null, ['class' => 'form-control', 'id' => 'mask_date', 'placeholder' => 'DD/MM/YYYY']) }}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {{ Form::label('description', trans('common.user.description')) }}
                    {{ Form::textarea('description', $user->description, ['class' => 'form-control', 'placeholder' => 'Something about ...', 'rows' => '3']) }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="form-actions text-center">
                {{ Form::button('<i class="fa fa-check"></i>  ' . trans('common.update'), ['type' => 'submit', 'class' => 'btn btn-primary', 'name' => 'submit', 'id' => 'submit']) }}
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
    <script type='text/javascript'>
        function preview_image(event)
        {
            var reader = new FileReader();
            reader.onload = function()
            {
                var output = document.getElementById('avatar');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
