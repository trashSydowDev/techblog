@extends ('backend.templates.main')

@section ('breadcrumb')
    <ul class='breadcrumb'>
        <li>{{ trans('form.home') }}</li>
        <li>{{ trans('resources.Users') }}</li>
    </ul>
@stop

@section ('content')
    <div class="l-block-1">
        <div class='toolbar'>
            {!!
                link_to_action(
                    'Backend\UsersController@create',
                    trans('form.create', ['resource'=>trans('resources.User')]),
                    null,
                    ['class'=>'btn']
                )
            !!}
        </div>

        @if ( $users && count($users) > 0 )
            <table>
                <thead>
                    <tr>
                        <th>{{ trans('resources.attributes.User.name') }}</th>
                        <th>{{ trans('resources.attributes.User.email') }}</th>
                        <th>{{ trans('resources.attributes.User.created_at') }}</th>
                        <th>{{ trans('form.actions') }}</th>
                    </tr>
                </thead>

                @foreach ($users as $user)
                    <tbody>
                        <tr>
                            <td>{!!
                                    link_to_action(
                                      'Backend\UsersController@show',
                                      $user->name,
                                      ['id' => $user->id ]
                                    )
                                !!}
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                {!!
                                    link_to_action(
                                      'Backend\UsersController@edit',
                                      trans('form.edit'),
                                      ['id' => $user->id ]
                                    )
                                !!}
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        @else
            <div class='well'>
                {{ trans('dialog.there_is_none', ['resource' => strtolower(trans('resources.Users'))]) }}
                {!! link_to_action('Backend\UsersController@create', trans('dialog.create_the_first_one')) !!}
            </div>
        @endif
    </div>
@stop
