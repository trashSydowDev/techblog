<ul id="menu" class="l-horizontal menubar">
    <a class="menu-activator" data-toggle="#menu"></a>
    <li>
        <a href="#">Dashboard</a>
    </li>
    <li>
        {!! link_to_action('Backend\PostsController@index', trans('resources.Posts')) !!}
    </li>
    <li>
        {!! link_to_action('Backend\PagesController@index', trans('resources.Pages')) !!}
    </li>
    <li>
        {!! link_to_action('Backend\UsersController@index', trans('resources.Users')) !!}
    </li>

</ul>
