<div itemscope="" itemtype="http://schema.org/BlogPosting">
    <h1 itemprop="name headline">
        {{ $page->title }}
    </h1>
    <div>
        por
        <span itemprop="author" itemscope="" itemtype="http://schema.org/Person">
            <span itemprop="name">
                <a href="{{ $author->website }}" itemprop="url" rel="author">
                    {{ $author->name }}
                </a>
            </span>
        </span>
        em
        <span datetime="{{ date('c', strtotime($page->created_at)) }}" itemprop="datePublished">
            {{ date('M d, Y', strtotime($page->created_at)) }}
        </span>
    </div>
    <div class="markdown-markup" data-module="CodeHighlight" itemprop="articleBody">
        {!! $htmlContent !!}
    </div>
</div>
