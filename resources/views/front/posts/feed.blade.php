<rss version="2.0">
  <channel>
    <title>{{ Config::get('blog.blogname') }}</title>
    <link>{{ URL::to('/') }}</link>
    @if (Config::get('blog.blogdesc'))
      <description>{{ Config::get('blog.blogdesc') }}</description>
    @else
      <description>{{ Config::get('blog.blogname') }} posts</description>
    @endif
    <lastBuildDate>{{ date('r') }}</lastBuildDate>
    @foreach ($posts as $post)
      <item>
        <title><![CDATA[{{ $post->title }}]]></title>
        <link>{{ action('Frontend\CmsController@showPost', ['slug'=>$post->slug]) }}</link>
        <description><![CDATA[{{ $post->lean_content }}]]></description>
        <pubDate>{{ date('r', strtotime($post->created_at)) }}</pubDate>
      </item>
    @endforeach
  </channel>
</rss>
