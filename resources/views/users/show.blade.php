@extends('layouts.default', [
    'breadcrumbs' => [
        ['text' => trans('common.user.user_menu'), 'url' => route('users.index')],
        ['text' => $user->fullname]
    ]
])

@section('user_menu', 'active open')

@section('content')

<h1 class="page-title text-center">
    {{ $user->fullname }}

    <div class="actions pull-right">
        @if ($user->id == \Auth::user()->id)
            <a href="{{ route('profile.edit', \Auth::user()) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;&nbsp;{{ trans('common.user.update_profile') }}</a>
        @elseif (\Auth::user()->isAdmin())
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;&nbsp;{{ trans('common.edit') }}</a>
        @endif
    </div>
</h1>

<div class="row">
    <div class="col-sm-4 col-xs-12">
        <div class="text-center">
            @if($user->avatar)
                <img src="{{ asset('uploads/avatar/' . $user->avatar) }}" height="250" width="250" alt="{{ $user->fullname }}" class="mt-5 mb-5">
            @else
                <img src="{{ asset('uploads/avatar/user.png') }}" height="250" width="250"  alt="{{ $user->fullname }}" class="">
            @endif
        </div>
    </div>
    <div class="col-sm-8 col-xs-12">
        <div class="table-scrollable table-scrollable-borderless" style="width:100%;">
            <table class="table table-hover table-list">
                <tbody>
                <tr>
                    <td width="150px"><strong>{{ trans('common.user.username') }}</strong></td>
                    <td>{{ $user->username }}</td>
                </tr>
                <tr>
                    <td width="150px"><strong>{{ trans('common.user.fullname') }}</strong></td>
                    <td>{{ $user->fullname }}</td>
                </tr>
                <tr>
                    <td width="150px"><strong>{{ trans('common.user.role') }}</strong></td>
                    <td>{{ \App\Models\User::roles()[$user->role] }}</td>
                </tr>
                <tr>
                    <td width="150px"><strong>{{ trans('common.user.email') }}</strong></td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td width="150px"><strong>{{ trans('common.user.birthday') }}</strong></td>
                    <td>{{ !empty($user->birthday) ? \Carbon\Carbon::createFromFormat('Y-m-d', $user->birthday)->format('d/m/Y') : null }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="clearfix margin-bottom-20"> </div>
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 description">
        <h3>Description</h3>
        <p>{!! $user->description !!}</p>
    </div>
</div>
@endsection

