@if ($post->id)
    {!! Form::model(
            $post,
            [
                'action' => ['Backend\PostsController@update', $post->id],
                'method' => 'PUT',
            ]
        )
    !!}
@else
    {!! Form::model($post, [ 'action' => 'Backend\PostsController@store' ]) !!}
@endif
    <fieldset>
        {!! Form::label('title', trans('resources.attributes.Post.title')) !!}
        {!! Form::text('title') !!}
    </fieldset>

    <fieldset>
        {!! Form::label('slug', trans('resources.attributes.Post.slug')) !!}
        {!! Form::text('slug') !!}
    </fieldset>

    <fieldset>
        {!! Form::label('lean_content', trans('resources.attributes.Post.lean_content')) !!}
        {!! Form::textarea('lean_content') !!}
    </fieldset>

    <fieldset>
        {!! Form::label('content', trans('resources.attributes.Post.content')) !!}
        {!! Form::textarea('content') !!}
    </fieldset>

    <div class='well'>
        {!! Form::submit(trans('form.save', ['resource'=>trans('resources.Post')])) !!}
        {!! link_to_action('Backend\PostsController@index', trans('form.back'), null, ['class'=>'btn is-inverted']) !!}
        @if ($post->id)
            {!! link_to_action('Backend\PostsController@destroy', trans('form.delete'), ['id'=>$post->id], ['method'=>'delete', 'class'=>'btn is-danger']) !!}
        @endif
    </div>

{!! Form::close() !!}
