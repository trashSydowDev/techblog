@extends ('backend.templates.main')

@section ('breadcrumb')
    <ul class='breadcrumb'>
        <li>{{ trans('form.home') }}</li>
        <li>{!! link_to_action('Backend\PagesController@index', trans('resources.Pages')) !!}</li>
        <li>{{ trans('form.edditing') }} {{{ $page->title }}}</li>
    </ul>
@stop

@section ('content')
    <div class="l-block-1">
        @include ('backend.pages._form')
    </div>
@stop
