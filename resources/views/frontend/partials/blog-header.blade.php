<div class="page-header mt-30 mb-75">
    <div class="container">
        <div class="archive-header">
            <div class="row align-items-center">
                <div class="col-xl-3">
                    <h1 class="mb-15">Blog</h1>
                    <div class="breadcrumb">
                        <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                        <span></span> Blog
                    </div>
                </div>
                <div class="col-xl-9 text-end d-none d-xl-block">
                    <ul class="tags-list">
                        @foreach ($allTags as $tag)
                            <li class="hover-up">
                                <a href="{{ route('blog.tag', $tag) }}"><i
                                        class="fi-rs-cross mr-10"></i>{{ $tag }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
