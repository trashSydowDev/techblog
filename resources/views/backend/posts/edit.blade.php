@extends ('backend.templates.main')

@section ('breadcrumb')
    <ul class='breadcrumb'>
        <li>{{ trans('form.home') }}</li>
        <li>{!! link_to_action('Backend\PostsController@index', trans('resources.Posts')) !!}</li>
        <li>{{ trans('form.edditing') }} {{{ $post->title }}}</li>
    </ul>
@stop

@section ('content')
    <div class="l-block-1">
        @include ('backend.posts._form')
    </div>
@stop
