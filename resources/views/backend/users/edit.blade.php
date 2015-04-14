@extends ('backend.templates.main')

@section ('breadcrumb')
    <ul class='breadcrumb'>
        <li>{{ trans('form.home') }}</li>
        <li>{!! link_to_action('Backend\UsersController@index', trans('resources.Users')) !!}</li>
        <li>{{ trans('form.edditing') }} {{{ $user->name }}}</li>
    </ul>
@stop

@section ('content')
    <div class="l-block-1">
        @include ('backend.users._form')
    </div>
@stop
