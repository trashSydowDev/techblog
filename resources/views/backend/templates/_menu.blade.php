<ul id="menu" class="l-horizontal menubar">
    <a class="menu-activator" data-toggle="#menu"></a>
    <li>
        <a href="#">Dashboard</a>
    </li>
    <li>
    {!! link_to_action('Backend\PostsController@index', 'Posts') !!}
    </li>
    <li>
    {!! link_to_action('Backend\PagesController@index', 'Pages') !!}
    </li>
    <li>
        <a href="#">Settings</a>
    </li>

</ul>
