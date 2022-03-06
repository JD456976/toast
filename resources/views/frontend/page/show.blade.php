<x-layouts.app>
    <x-slot:title>
        {{ $page->title }}
    </x-slot:title>
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Pages <span></span> Terms of Service
                </div>
            </div>
        </div>
        <div class="page-content pt-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 m-auto">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="single-page pr-30 mb-lg-0 mb-sm-5">
                                    <div class="single-header style-2">
                                        <h2>{{ $page->title }}</h2>
                                        <div class="entry-meta meta-1 meta-3 font-xs mt-15 mb-15">
                                            <span class="post-on">Last Updated: {{ $page->updated_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                    <div class="single-content mb-50">
                                        {{ $page->content }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layouts.app>
