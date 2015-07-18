@if ($user->id)
    {!!
        Form::model(
            $user,
            [
                'action' => ['Backend\UsersController@update', $user->id],
                'method' => 'PUT',
            ]
        )
    !!}
@else
    {!! Form::model($user, [ 'action' => 'Backend\UsersController@store' ]) !!}
@endif
    <fieldset>
        {!! Form::label('name', trans('resources.attributes.User.name')) !!}
        {!! Form::text('name') !!}
    </fieldset>

    <fieldset>
        {!! Form::label('email', trans('resources.attributes.User.email')) !!}
        {!! Form::text('email') !!}
    </fieldset>

    <fieldset>
        {!! Form::label('website', trans('resources.attributes.User.website')) !!}
        {!! Form::text('website') !!}
    </fieldset>

    <fieldset>
        {!! Form::label('password', trans('resources.attributes.User.password')) !!}
        {!! Form::password('password') !!}
    </fieldset>

    <div class='well'>
        {!! Form::submit(trans('form.save', ['resource'=>trans('resources.User')])) !!}
        {!! link_to_action('Backend\UsersController@index', trans('form.back'), null, ['class'=>'btn is-inverted']) !!}
        @if ($user->id)
            {!! link_to_action('Backend\UsersController@destroy', trans('form.delete'), ['id'=>$user->id], ['method'=>'delete', 'class'=>'btn is-danger']) !!}
        @endif
    </div>

{!! Form::close() !!}
