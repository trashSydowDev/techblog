@extends ('backend.templates.main')

@section ('breadcrumb')
    <ul class='breadcrumb'>
        <li>{{ trans('form.home') }}</li>
        <li>{{ trans('resources.Pages') }}</li>
    </ul>
@stop

@section ('content')
    <div class="l-block-1">
        <div class='toolbar'>
            {!!
                link_to_action(
                    'Backend\PagesController@create',
                    trans('form.create', ['resource'=>trans('resources.Page')]),
                    null,
                    ['class'=>'btn']
                )
            !!}
        </div>

        @if ( $pages && count($pages) > 0 )
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

                @foreach ($pages as $page)
                    <tbody>
                        <tr>
                            <td>{!!
                                    link_to_action(
                                      'Backend\PagesController@show',
                                      $page->title,
                                      ['id' => $page->id ]
                                    )
                                !!}
                            </td>
                            <td>{{ $page->slug }}</td>
                            <td>{{ $page->author_id }}</td>
                            <td>{{ $page->created_at }}</td>
                            <td>
                                {!!
                                    link_to_action(
                                      'Backend\PagesController@edit',
                                      trans('form.edit'),
                                      ['id' => $page->id ]
                                    )
                                !!}
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        @else
            <div class='well'>
                {{ trans('dialog.there_is_none', ['resource' => strtolower(trans('resources.Pages'))]) }}
                {!! link_to_action('Backend\PagesController@create', trans('dialog.create_the_first_one')) !!}
            </div>
        @endif
    </div>
@stop
