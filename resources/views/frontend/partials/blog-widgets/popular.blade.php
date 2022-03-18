<div class="sidebar-widget product-sidebar mb-50 p-30 bg-grey border-radius-10">
    <h5 class="section-title style-1 mb-30">Trending Now</h5>
    @foreach ($popular as $blog)
        <div class="single-post clearfix">
            <div class="content">
                <h5><a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a></h5>
            </div>
        </div>
    @endforeach
</div>
