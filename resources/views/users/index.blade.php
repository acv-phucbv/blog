@extends('layouts.default',[
    'breadcrumbs' => [
        ['text' => trans("common.user.user_index")]
    ]
])

@section('user_menu', 'active open')
@section('user_menu_list', 'active open')

@section('content')

    <h1 class="page-title">
        {{ trans("common.user.user_menu_list") }}
        <div class="actions pull-right">
            @if(\Auth::user()->role == \App\Models\User::ROLE_ADMIN)
                <a href='{{ route("users.create") }}' class="btn green"><i
                            class="fa fa-plus"></i>&nbsp;&nbsp;{{ trans('common.add_new') }}</a>
            @endif
        </div>
    </h1>

    @if (! $users->isEmpty())
        <div class="table-scrollable">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>{{ trans('common.user.username') }}</th>
                    <th>{{ trans('common.user.fullname') }}</th>
                    <th>{{ trans('common.user.role') }}</th>
                    <th>{{ trans('common.user.email') }}</th>
                    <th>{{ trans('common.user.gender') }}</th>
                    <th>{{ trans('common.user.birthday') }}</th>
                    <th>{{ trans('common.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->fullname }}</td>
                        <td>{{ \App\Models\User::roles()[$user->role] }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->gender ? \App\Models\User::genders()[$user->gender] : '&nbsp;' }}</td>
                        <td>{{ $user->birthday }}</td>
                        <td class="center actions-button">
                            <a href="{{ route('users.show', $user->id) }}"
                               class="btn btn-sm btn-info">{{ trans('common.view') }}</a>
                            @if(\Auth::user()->role == \App\Models\User::ROLE_ADMIN)
                                <a href="{{ route('users.edit', $user->id) }}"
                                   class="btn btn-warning btn-sm">{{ trans('common.edit') }}</a>
                                <button type="button" class="btn btn-danger btn-sm btn-item-delete"
                                        data-form="#form-delete-{{ $user->id }}">{{ trans('common.delete') }}</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-xs-12 text-right">
                {{ $users->links() }}
            </div>
        </div>

        @if(\Auth::user()->role == \App\Models\User::ROLE_ADMIN)
            <div class="hidden">
                @foreach($users as $user)
                    @include('partials.form_delete', ['route' => "users.destroy", 'item' => $user])
                @endforeach
            </div>
        @endif

    @else
        <div class="note note-danger">
            <p>{{ trans('common.no_query_results') }}</p>
        </div>
    @endif

    @include('partials.modal_message')
    @include('partials.modal_confirm')

    @if(\Auth::user()->role == \App\Models\User::ROLE_ADMIN)
        @include('partials.form_multiple_checkbox')
    @endif

@endsection
