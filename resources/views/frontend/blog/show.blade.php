<x-layouts.app>
    <x-slot:title>
        Viewing Blog: {{ $blog->title }}
    </x-slot:title>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> <a href="shop-grid-right.html">Recipes</a> <span></span> Best smartwatch 2021: the top
                    wearables you can buy today
                </div>
            </div>
        </div>
        <div class="page-content mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-11 col-lg-12 m-auto">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="single-page pt-50 pr-30">
                                    <div class="single-header style-2">
                                        <div class="row">
                                            <div class="col-xl-10 col-lg-12 m-auto">
                                                <h6 class="mb-10"><a href="#">{{ $blog->category->title }}</a></h6>
                                                <h2 class="mb-10">{{ $blog->title }}
                                                    today</h2>
                                                <div class="single-header-meta">
                                                    <div class="entry-meta meta-1 font-xs mt-15 mb-15">
                                                        <a class="author-avatar"
                                                           href="{{ route('user.show', $blog->user_id) }}">
                                                            <img class="img-circle"
                                                                 src="{{ $blog->user->getFirstMediaUrl('avatars') }}"
                                                                 alt=""/>
                                                        </a>
                                                        <span class="post-by">By <a
                                                                href="{{ route('user.show', $blog->user_id) }}">{{ $blog->user->displayName() }}</a></span>
                                                        <span class="post-on has-dot">{{ $blog->createdAt() }}</span>
                                                    </div>
                                                    <div class="social-icons single-share">
                                                        <ul class="text-grey-5 d-inline-block">
                                                            <li class="mr-5">
                                                                <a href="#"><img
                                                                        src="assets/imgs/theme/icons/icon-bookmark.svg"
                                                                        alt=""/></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><img
                                                                        src="assets/imgs/theme/icons/icon-heart-2.svg"
                                                                        alt=""/></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <figure class="single-thumbnail">
                                        <img src="{{ $blog->getFirstMediaUrl('blogs') }}" alt=""/>
                                    </figure>
                                    <div class="single-content">
                                        <div class="row">
                                            <div class="col-xl-10 col-lg-12 m-auto">
                                                <p>
                                                    {!! $blog->content !!}
                                                </p>
                                                <!--Entry bottom-->
                                                <div class="entry-bottom mt-50 mb-30">
                                                    <div class="tags w-50 w-sm-100">
                                                        @foreach ($blog->tags as $tag)
                                                            <a href="blog-category-big.html" rel="tag"
                                                               class="hover-up btn btn-sm btn-rounded mr-10">{{ $tag->name }}</a>
                                                        @endforeach
                                                    </div>
                                                    <div class="social-icons single-share">
                                                        <ul class="text-grey-5 d-inline-block">
                                                            <li><strong class="mr-10">Share this:</strong></li>
                                                            <li class="social-facebook">
                                                                <a href="#"><img
                                                                        src="assets/imgs/theme/icons/icon-facebook.svg"
                                                                        alt=""/></a>
                                                            </li>
                                                            <li class="social-twitter">
                                                                <a href="#"><img
                                                                        src="assets/imgs/theme/icons/icon-twitter.svg"
                                                                        alt=""/></a>
                                                            </li>
                                                            <li class="social-instagram">
                                                                <a href="#"><img
                                                                        src="assets/imgs/theme/icons/icon-instagram.svg"
                                                                        alt=""/></a>
                                                            </li>
                                                            <li class="social-linkedin">
                                                                <a href="#"><img
                                                                        src="assets/imgs/theme/icons/icon-pinterest.svg"
                                                                        alt=""/></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!--Comment form-->
                                                <div class="comment-form">
                                                    <h3 class="mb-15">Leave a Comment</h3>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            @include('frontend.partials.blog-comment-form')
                                                            <div class="comments-area">
                                                                <h3 class="mb-30">Comments</h3>
                                                                <div class="comment-list">
                                                                    @if (count($blog->comments) == 0)
                                                                        <h5>No Comments To Display</h5>
                                                                    @else
                                                                        @foreach ($blog->comments as $comment)
                                                                            <div
                                                                                class="single-comment  d-flex">
                                                                                <div
                                                                                    class="user just d-flex">
                                                                                    <div class="thumb text-center">
                                                                                        <img
                                                                                            src="{{ $comment->user->getFirstMediaUrl('avatars') }}"
                                                                                            alt=""/>
                                                                                        <a href="{{ route('user.show', $comment->user_id) }}"
                                                                                           class="font-heading text-brand">{{ $comment->user->displayName() }}</a>
                                                                                    </div>
                                                                                    <div class="desc">
                                                                                        <div
                                                                                            class="d-flex justify-content-between mb-10">
                                                                                            <div
                                                                                                class="d-flex align-items-center">
                                                                                    <span
                                                                                        class="font-xs text-muted">{{ $comment->createdAt() }} </span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <p class="mb-10">
                                                                                            {{ $comment->comment }}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row justify-content-end">
                                                                                    <div class="col-6">
                                                                                        <button data-bs-toggle="modal"
                                                                                                data-bs-target="#report_comment"
                                                                                                class="btn btn-sm">
                                                                                            Report
                                                                                        </button>
                                                                                    </div>
                                                                                    @role('admin')
                                                                                    <div class="col-6">
                                                                                        {!! Form::open(['route' => ['blog.comment.destroy', $comment->id], 'method' => 'delete']) !!}
                                                                                        {!! Form::submit('Delete', ['class' => 'form-control']) !!}
                                                                                        {!! Form::close() !!}
                                                                                    </div>
                                                                                    @endrole
                                                                                </div>
                                                                            </div>
                                                                            @include('frontend.partials.modals.report-comment')
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 primary-sidebar sticky-sidebar pt-50">
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
            </div>
        </div>
    </main>
</x-layouts.app>
