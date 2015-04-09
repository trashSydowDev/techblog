@extends ('backend.templates.main')

@section ('breadcrumb')
    <ul class='breadcrumb'>
        <li>{{ trans('form.home') }}</li>
        <li>{{ trans('resources.Posts') }}</li>
    </ul>
@stop

@section ('content')
    <div class="l-block-1">
        <div class='toolbar'>
            {!!
                link_to_action(
                    'Backend\PostsController@create',
                    trans('form.create', ['resource'=>trans('resources.Post')]),
                    null,
                    ['class'=>'btn']
                )
            !!}
        </div>

        @if ( $posts && count($posts) > 0 )
            <table>
                <thead>
                    <tr>
                        <th>{{ trans('resources.attributes.Page.title') }}</th>
                        <th>{{ trans('resources.attributes.Page.slug') }}</th>
                        <th>{{ trans('resources.attributes.Page.author') }}</th>
                        <th>{{ trans('resources.attributes.Page.created_at') }}</th>
                        <th>{{ trans('form.actions') }}</th>
                    </tr>
                </thead>

                @foreach ($posts as $post)
                    <tbody>
                        <tr>
                            <td>{!!
                                    link_to_action(
                                      'Backend\PostsController@show',
                                      $post->title,
                                      ['id' => $post->id ]
                                    )
                                !!}
                            </td>
                            <td>{{ $post->slug }}</td>
                            <td>{{ $post->author_id }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                {!!
                                    link_to_action(
                                      'Backend\PostsController@edit',
                                      'Editar',
                                      ['id' => $post->id ]
                                    )
                                !!}
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        @else
            <div class='well'>
                {{ trans('dialog.there_is_none', ['resource' => strtolower(trans('resources.Posts'))]) }}
                {!! link_to_action('Backend\PostsController@create', trans('dialog.create_the_first_one')) !!}
            </div>
        @endif
    </div>
@stop
