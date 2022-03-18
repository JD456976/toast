<div class="sidebar-widget widget-tags mb-50 pb-10">
    <h5 class="section-title style-1 mb-30">Popular Tags</h5>
    <ul class="tags-list">
        @foreach (array_keys($tags) as $tag)
            <li class="hover-up">
                <a href="{{ route('blog.tag', $tag) }}"><i class="fi-rs-cross mr-10"></i>{{ $tag }}</a>
            </li>
        @endforeach
    </ul>
</div>
