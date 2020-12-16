<div>
    @foreach ($blogs as $blog)
    <div class="block-21 mb-4 d-flex">
        <a class="img mr-4 rounded" style="background-image: url({{ \Storage::url($blog->image) }});"></a>
        <div class="text">
            <h3 class="heading"><a href="{{ route('pages.blogs.show', $blog->slug) }}">{{ $blog->title }}</a>
            </h3>
            <div class="meta">
                <div><a href="#">{{ $blog->created_at->format('M jS, Y') }}</a></div>
                <div><a href="#">{{ $blog->author->nickname }}</a></div>
                <div><a href="#">[19]</a></div>
            </div>
        </div>
    </div>
    @endforeach
</div>