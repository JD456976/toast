<x-layouts.app>
    <x-slot:title>
        Blog List
    </x-slot:title>
    <main class="main">
        <div class="page-header mt-30 mb-75">
            <div class="container">
                <div class="archive-header">
                    <div class="row align-items-center">
                        <div class="col-xl-3">
                            <h1 class="mb-15">Blog & News</h1>
                            <div class="breadcrumb">
                                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                                <span></span> Blog & News
                            </div>
                        </div>
                        <div class="col-xl-9 text-end d-none d-xl-block">
                            <ul class="tags-list">
                                <li class="hover-up">
                                    <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Shopping</a>
                                </li>
                                <li class="hover-up active">
                                    <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Recips</a>
                                </li>
                                <li class="hover-up">
                                    <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Kitchen</a>
                                </li>
                                <li class="hover-up">
                                    <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>News</a>
                                </li>
                                <li class="hover-up mr-0">
                                    <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Food</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter mb-50 pr-30">
                            <div class="totall-product">
                                <h2>
                                    <img class="w-36px mr-10" src="assets/imgs/theme/icons/category-1.svg" alt=""/>
                                    Kitchen Articles
                                </h2>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Show:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="active" href="#">50</a></li>
                                            <li><a href="#">100</a></li>
                                            <li><a href="#">150</a></li>
                                            <li><a href="#">200</a></li>
                                            <li><a href="#">All</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>Sort:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span>Featured <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="active" href="#">Featured</a></li>
                                            <li><a href="#">Newest</a></li>
                                            <li><a href="#">Most comments</a></li>
                                            <li><a href="#">Release Date</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="loop-grid loop-list pr-30 mb-50">
                            @foreach ($blogs as $blog)
                                <article class="wow fadeIn animated hover-up mb-30 animated">
                                    <div class="post-thumb"
                                         style="background-image: url({{ $blog->getFirstMediaUrl('blogs') }})">
                                        <div class="entry-meta">
                                            <a class="entry-meta meta-2" href="blog-category-grid.html"><i
                                                    class="fi-rs-play-alt"></i></a>
                                        </div>
                                    </div>
                                    <div class="entry-content-2 pl-50">
                                        <h3 class="post-title mb-20">
                                            <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                                        </h3>
                                        <p class="post-exerpt mb-40">{!! Str::words($blog->content, 30, '...') !!}</p>
                                        <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                            <div>
                                                <span class="post-on">{{ $blog->createdAt() }}</span>
                                                <span class="hit-count has-dot">{{ views($blog)->count() }} Views</span>
                                            </div>
                                            <a href="{{ route('blog.show', $blog->slug) }}"
                                               class="text-brand font-heading font-weight-bold">Read
                                                more <i class="fi-rs-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            <nav aria-label="Page navigation example">
                                {{ $blogs->links() }}
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="widget-area">
                        @include('frontend.partials.blog-widgets.search')
                        @include('frontend.partials.blog-widgets.categories')
                        <!-- Product sidebar Widget -->
                        @include('frontend.partials.blog-widgets.popular')
                        @include('frontend.partials.blog-widgets.gallery')
                        <!--Tags-->
                            @include('frontend.partials.blog-widgets.tags')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layouts.app>
