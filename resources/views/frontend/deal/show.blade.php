<x-layouts.app>
    <x-slot:title>
        Viewing Deal: {{ $deal->title }}
    </x-slot:title>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> <a href="shop-grid-right.html">Vegetables & tubers</a> <span></span> Seeds of Change
                    Organic
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50 mt-30">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider">
                                        @foreach ($deal->getMedia('deals') as $image)
                                            <figure class="border-radius-10">
                                                <img src="{{ $image->getUrl() }}" alt="product image"/>
                                            </figure>
                                        @endforeach
                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails">
                                        @foreach ($deal->getMedia('deals') as $image)
                                            <div><img src="{{ $image->getUrl() }}" alt="product image"/></div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- End Gallery -->
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info pr-30 pl-30">
                                    <span class="stock-status out-stock"> Sale Off </span>
                                    <div class="row justify-content-end">
                                        @auth
                                            <div class="row justify-content-center mb-10">
                                                @role('admin')
                                                <p class="text-center">
                                                    <button class="btn btn-primary btn-sm" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseExample"
                                                            aria-expanded="false" aria-controls="collapseExample">
                                                        Admin Functions
                                                    </button>
                                                    <button class="btn btn-primary btn-sm" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#resoveReport"
                                                            aria-expanded="false" aria-controls="resoveReport">
                                                        Deal Reports
                                                    </button>
                                                </p>
                                                <div class="collapse" id="collapseExample">
                                                    <div class="card card-body">
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="{{ route('admin.deal.edit', $deal->id) }}">
                                                                <button class="btn btn-sm">Edit Deal</button>
                                                            </a>
                                                            @if ($deal->is_featured == 1)
                                                                <a href="{{ route('deal.unfeature', $deal->id) }}">
                                                                    <button class="btn btn-sm">Unfeature Deal</button>
                                                                </a>
                                                            @else
                                                                <a href="{{ route('deal.feature', $deal->id) }}">
                                                                    <button class="btn btn-sm">Feature Deal</button>
                                                                </a>
                                                            @endif
                                                            @if ($deal->is_active == 1)
                                                                <a href="{{ route('deal.unapprove', $deal->id) }}">
                                                                    <button class="btn btn-sm">Unapprove Deal</button>
                                                                </a>
                                                            @else
                                                                <a href="{{ route('deal.approve', $deal->id) }}">
                                                                    <button class="btn btn-sm">Approve Deal</button>
                                                                </a>
                                                            @endif
                                                            @if ($deal->is_frontpage == 1)
                                                                <a href="{{ route('deal.unfrontpage', $deal->id) }}">
                                                                    <button class="btn btn-sm">Remove from Frontpage
                                                                    </button>
                                                                </a>
                                                            @else
                                                                <a href="{{ route('deal.frontpage', $deal->id) }}">
                                                                    <button class="btn btn-sm">Show on Frontpage
                                                                    </button>
                                                                </a>
                                                            @endif
                                                            @endrole
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="collapse" id="resoveReport">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5 class="mb-0">Report Listing</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th>Created On</th>
                                                                        <th>By</th>
                                                                        <th>Reason</th>
                                                                        <th>Comment</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach ($deal->reports as $report)
                                                                        <tr>
                                                                            <td>{{ $report->id }}</td>
                                                                            <td>{{ $report->createdAt() }}</td>
                                                                            <td>
                                                                                <a href="{{ route('user.show', $report->user_id) }}">{{ $report->user->displayName() }}</a>
                                                                            </td>
                                                                            <td>{{ $report->reason }}</td>
                                                                            <td>{{ $report->comment }}</td>
                                                                            <td>
                                                                                @if ($report->is_resolved == 0)
                                                                                    {!! Form::open(['route' => ['admin.report.update', $report->id], 'method' => 'patch']) !!}
                                                                                    {!! Form::submit('Resolve', ['class' => 'btn btn-sm']) !!}
                                                                                    {!! Form::close() !!}
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <button data-bs-toggle="modal" data-bs-target="#report_deal"
                                                        class="btn btn-sm">Report Deal
                                                </button>
                                                @include('frontend.partials.modals.report-deal')
                                            </div>
                                        @endauth
                                    </div>
                                    <h2 class="title-detail">{{ $deal->title }}</h2>
                                    <div class="product-detail-rating">
                                        <div class="product-rate-cover text-end">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                        </div>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <span class="current-price text-brand">{{ $deal->dealDiscount() }}</span>
                                            <span>
                                                    <span class="save-price font-md color3 ml-15">26% Off</span>
                                                    <span
                                                        class="old-price font-md ml-15">{{ $deal->dealPrice() }}</span>
                                                </span>
                                        </div>
                                    </div>
                                    <div class="short-desc mb-30">
                                        <p class="font-lg">{{ $deal->description }}</p>
                                    </div>
                                    <div class="attr-detail attr-size mb-30">
                                        <strong class="mr-10">Rate This Deal: </strong>
                                        <ul class="list-filter size-filter font-small">
                                            <li>
                                                <a href="{{ route('deal.voteup', $deal->id) }}"><img
                                                        src="{{ asset('assets/frontend/imgs/theme/icons/thumbs-up-regular.svg') }}"
                                                        alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('deal.votedown', $deal->id) }}"><img
                                                        src="{{ asset('assets/frontend/imgs/theme/icons/thumbs-down-regular.svg') }}"
                                                        alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="attr-detail attr-size mb-30">
                                        <strong class="mr-10">Average Rating: </strong>
                                        <h6>{{ $deal->dealRating() }}</h6>
                                    </div>
                                    <div class="detail-extralink mb-50">
                                        <div class="detail-qty border radius">
                                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                            <span class="qty-val">1</span>
                                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                        <div class="product-extra-link2">
                                            <button type="submit" class="button button-add-to-cart"><i
                                                    class="fi-rs-shopping-cart"></i>Add to cart
                                            </button>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                               href="{{ route('watchlist.store', $deal->product_id) }}"><i
                                                    class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up"
                                               href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                    </div>
                                    <div class="font-xs">
                                        <ul class="mr-50 float-start">
                                            <li class="mb-5">Posted By: <span class="text-brand"><a
                                                        href="#">{{ $deal->user->displayName() }}</a></span></li>
                                            <li class="mb-5">Posted:<span
                                                    class="text-brand"> {{ $deal->createdAt() }}</span></li>
                                            <li>LIFE: <span class="text-brand">70 days</span></li>
                                        </ul>
                                        <ul class="float-start">
                                            <li class="mb-5">Brand: <a href="#">{{ $deal->brand->name }}</a></li>
                                            <li class="mb-5">Tags: <a href="#" rel="tag">Snack</a>, <a href="#"
                                                                                                       rel="tag">Organic</a>,
                                                <a href="#" rel="tag">Brown</a></li>
                                            <li>Stock:<span class="in-stock text-brand ml-5">8 Items In Stock</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                           href="#Description">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="audit-tab" data-bs-toggle="tab" href="#audit">Audit
                                            ({{ count($deal->audits) }})</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab"
                                           href="#Vendor-info">Vendor</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Comments">Comments
                                            ({{ count($deal->comments) }})</a>
                                    </li>
                                </ul>
                                <div class="tab-content shop_info_tab entry-main-content">
                                    <div class="tab-pane fade show active" id="Description">
                                        <div class="">
                                            <p>Uninhibited carnally hired played in whimpered dear gorilla koala
                                                depending and much yikes off far quetzal goodness and from for grimaced
                                                goodness unaccountably and meadowlark near unblushingly crucial scallop
                                                tightly neurotic hungrily some and dear furiously this apart.</p>
                                            <p>Spluttered narrowly yikes left moth in yikes bowed this that grizzly much
                                                hello on spoon-fed that alas rethought much decently richly and wow
                                                against the frequent fluidly at formidable acceptably flapped besides
                                                and much circa far over the bucolically hey precarious goldfinch
                                                mastodon goodness gnashed a jellyfish and one however because.</p>
                                            <ul class="product-more-infor mt-30">
                                                <li><span>Type Of Packing</span> Bottle</li>
                                                <li><span>Color</span> Green, Pink, Powder Blue, Purple</li>
                                                <li><span>Quantity Per Case</span> 100ml</li>
                                                <li><span>Ethyl Alcohol</span> 70%</li>
                                                <li><span>Piece In One</span> Carton</li>
                                            </ul>
                                            <hr class="wp-block-separator is-style-dots"/>
                                            <p>Laconic overheard dear woodchuck wow this outrageously taut beaver hey
                                                hello far meadowlark imitatively egregiously hugged that yikes minimally
                                                unanimous pouted flirtatiously as beaver beheld above forward energetic
                                                across this jeepers beneficently cockily less a the raucously that magic
                                                upheld far so the this where crud then below after jeez enchanting
                                                drunkenly more much wow callously irrespective limpet.</p>
                                            <h4 class="mt-30">Packaging & Delivery</h4>
                                            <hr class="wp-block-separator is-style-wide"/>
                                            <p>Less lion goodness that euphemistically robin expeditiously bluebird
                                                smugly scratched far while thus cackled sheepishly rigid after due one
                                                assenting regarding censorious while occasional or this more crane went
                                                more as this less much amid overhung anathematic because much held one
                                                exuberantly sheep goodness so where rat wry well concomitantly.</p>
                                            <p>Scallop or far crud plain remarkably far by thus far iguana lewd
                                                precociously and and less rattlesnake contrary caustic wow this near
                                                alas and next and pled the yikes articulate about as less cackled
                                                dalmatian in much less well jeering for the thanks blindly sentimental
                                                whimpered less across objectively fanciful grimaced wildly some wow and
                                                rose jeepers outgrew lugubrious luridly irrationally attractively
                                                dachshund.</p>
                                            <h4 class="mt-30">Suggested Use</h4>
                                            <ul class="product-more-infor mt-30">
                                                <li>Refrigeration not necessary.</li>
                                                <li>Stir before serving</li>
                                            </ul>
                                            <h4 class="mt-30">Other Ingredients</h4>
                                            <ul class="product-more-infor mt-30">
                                                <li>Organic raw pecans, organic raw cashews.</li>
                                                <li>This butter was produced using a LTG (Low Temperature Grinding)
                                                    process
                                                </li>
                                                <li>Made in machinery that processes tree nuts but does not process
                                                    peanuts, gluten, dairy or soy
                                                </li>
                                            </ul>
                                            <h4 class="mt-30">Warnings</h4>
                                            <ul class="product-more-infor mt-30">
                                                <li>Oil separation occurs naturally. May contain pieces of shell.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="audit">
                                        <!--begin::Accordion-->
                                        <div class="accordion" id="kt_accordion_1">
                                            @foreach ($deal->audits as $audit)
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="kt_accordion_1_header_1">
                                                        <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#audit_{{ $audit->id }}"
                                                                aria-expanded="true"
                                                                aria-controls="audit_{{ $audit->id }}">
                                                            Audit #{{ $audit->id }}
                                                        </button>
                                                    </h2>
                                                    <div id="audit_{{ $audit->id }}"
                                                         class="accordion-collapse collapsed show"
                                                         aria-labelledby="kt_accordion_1_header_1"
                                                         data-bs-parent="#kt_accordion_1">
                                                        <div class="accordion-body">
                                                            {{ $audit->user->displayName() }} - {{ $audit->event }} -
                                                            this deal {{ $audit->created_at->diffForHumans() }}
                                                            <div class="d-flex flex-column">
                                                                @if(!empty($audit->new_values['title']))
                                                                    <li class="d-flex align-items-center py-2">
                                                                        <span class="bullet me-5"></span><strong>Old
                                                                            Title:</strong> {{ $audit->old_values['title'] }}
                                                                        <strong> New
                                                                            Title:</strong> {{ $audit->new_values['title'] }}
                                                                    </li>
                                                                @endif
                                                                @if(!empty($audit->new_values['discount']))
                                                                    <li class="d-flex align-items-center py-2">
                                                                        <span class="bullet me-5"></span><strong> Old
                                                                            Discount:</strong> {{ $audit->old_values['discount'] }}
                                                                        <strong> New
                                                                            Discount:</strong> {{ $audit->new_values['discount'] }}
                                                                    </li>
                                                                @endif
                                                                @if(!empty($audit->new_values['price']))
                                                                    <li class="d-flex align-items-center py-2">
                                                                        <span class="bullet me-5"></span> <strong> Old
                                                                            Price:</strong> {{ $audit->old_values['price'] }}
                                                                        <strong> New
                                                                            Price:</strong> {{ $audit->new_values['price'] }}
                                                                    </li>
                                                                @endif
                                                                @if(!empty($audit->new_values['price_extras']))
                                                                    <li class="d-flex align-items-center py-2">
                                                                        <span class="bullet me-5"></span> <strong> Old
                                                                            Price
                                                                            Extras:</strong> {{ $audit->old_values['price_extras'] }}
                                                                        <strong> New Price
                                                                            Extras:</strong> {{ $audit->new_values['price_extras'] }}
                                                                    </li>
                                                                @endif
                                                                @if(!empty($audit->new_values['description']))
                                                                    <li class="d-flex align-items-center py-2">
                                                                        <span class="bullet me-5"></span> <strong> Old
                                                                            Description:</strong> {{ $audit->old_values['description'] }}
                                                                        <strong> New
                                                                            Description:</strong> {{ $audit->new_values['description'] }}
                                                                    </li>
                                                                @endif
                                                                @if(!empty($audit->new_values['link']))
                                                                    <li class="d-flex align-items-center py-2">
                                                                        <span class="bullet me-5"></span> <strong> Old
                                                                            Link:</strong> {{ $audit->old_values['link'] }}
                                                                        <strong> New
                                                                            Link:</strong> {{ $audit->new_values['link'] }}
                                                                    </li>
                                                                @endif
                                                                @if(!empty($audit->new_values['is_active']))
                                                                    <li class="d-flex align-items-center py-2">
                                                                        <span class="bullet me-5"></span> <strong> Old
                                                                            Status:</strong> {{ $audit->old_values['is_active'] }}
                                                                        <strong> New
                                                                            Status:</strong> {{ $audit->new_values['is_active'] }}
                                                                    </li>
                                                                @endif
                                                                @if(!empty($audit->new_values['is_frontpage']))
                                                                    <li class="d-flex align-items-center py-2">
                                                                        <span class="bullet me-5"></span> <strong> Old
                                                                            Status:</strong> {{ $audit->old_values['is_frontpage'] }}
                                                                        <strong> New
                                                                            Status:</strong> {{ $audit->new_values['is_frontpage'] }}
                                                                    </li>
                                                                @endif
                                                                @if(!empty($audit->new_values['is_featured']))
                                                                    <li class="d-flex align-items-center py-2">
                                                                        <span class="bullet me-5"></span> <strong> Old
                                                                            Status:</strong> {{ $audit->old_values['is_featured'] }}
                                                                        <strong> New
                                                                            Status:</strong> {{ $audit->new_values['is_featured'] }}
                                                                    </li>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!--end::Accordion-->
                                    </div>
                                    <div class="tab-pane fade" id="Vendor-info">
                                        <div class="vendor-logo d-flex mb-30">
                                            <img src="assets/imgs/vendor/vendor-18.svg" alt=""/>
                                            <div class="vendor-name ml-15">
                                                <h6>
                                                    <a href="vendor-details-2.html">Noodles Co.</a>
                                                </h6>
                                                <div class="product-rate-cover text-end">
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 90%"></div>
                                                    </div>
                                                    <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="contact-infor mb-50">
                                            <li><img src="assets/imgs/theme/icons/icon-location.svg" alt=""/><strong>Address: </strong>
                                                <span>5171 W Campbell Ave undefined Kent, Utah 53127 United States</span>
                                            </li>
                                            <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt=""/><strong>Contact
                                                    Seller:</strong><span>(+91) - 540-025-553</span></li>
                                        </ul>
                                        <div class="d-flex mb-55">
                                            <div class="mr-30">
                                                <p class="text-brand font-xs">Rating</p>
                                                <h4 class="mb-0">92%</h4>
                                            </div>
                                            <div class="mr-30">
                                                <p class="text-brand font-xs">Ship on time</p>
                                                <h4 class="mb-0">100%</h4>
                                            </div>
                                            <div>
                                                <p class="text-brand font-xs">Chat response</p>
                                                <h4 class="mb-0">89%</h4>
                                            </div>
                                        </div>
                                        <p>Noodles & Company is an American fast-casual restaurant that offers
                                            international and American noodle dishes and pasta in addition to soups and
                                            salads. Noodles & Company was founded in 1995 by Aaron Kennedy and is
                                            headquartered in Broomfield, Colorado. The company went public in 2013 and
                                            recorded a $457 million revenue in 2017.In late 2018, there were 460 Noodles
                                            & Company locations across 29 states and Washington, D.C.</p>
                                    </div>
                                    <div class="tab-pane fade" id="Comments">
                                        <!--Comments-->
                                        <div class="comments-area">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <h4 class="mb-30">User Comments</h4>
                                                    <div class="comment-list">
                                                        @if (count($deal->comments) == 0)
                                                            <h5>No Comments To Display</h5>
                                                        @else
                                                            @foreach ($deal->comments as $comment)
                                                                <div
                                                                    class="single-comment justify-content-between d-flex">
                                                                    <div class="user justify-content-between d-flex">
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
                                                                                <div class="d-flex align-items-center">
                                                                                    <span
                                                                                        class="font-xs text-muted">{{ $comment->createdAt() }} </span>
                                                                                </div>
                                                                            </div>
                                                                            <p class="mb-10">
                                                                                {{ $comment->comment }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <button data-bs-toggle="modal"
                                                                                data-bs-target="#report_comment"
                                                                                class="btn btn-sm">Report
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                @include('frontend.partials.modals.report-comment')
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h4 class="mb-30">Customer reviews</h4>
                                                    <div class="d-flex mb-30">
                                                        <div class="product-rate d-inline-block mr-15">
                                                            <div class="product-rating" style="width: 90%"></div>
                                                        </div>
                                                        <h6>4.8 out of 5</h6>
                                                    </div>
                                                    <div class="progress">
                                                        <span>5 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 50%"
                                                             aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                            50%
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>4 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 25%"
                                                             aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                            25%
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>3 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 45%"
                                                             aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                                                            45%
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>2 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 65%"
                                                             aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                            65%
                                                        </div>
                                                    </div>
                                                    <div class="progress mb-30">
                                                        <span>1 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 85%"
                                                             aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                            85%
                                                        </div>
                                                    </div>
                                                    <a href="#" class="font-xs text-muted">How are ratings
                                                        calculated?</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--comment form-->
                                        <div class="comment-form">
                                            <h4 class="mb-15">Add a Comment</h4>
                                            @include('frontend.partials.deal-comment-form')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-12">
                                <h2 class="section-title style-1 mb-30">Related products</h2>
                            </div>
                            <div class="col-12">
                                <div class="row related-products">
                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html" tabindex="0">
                                                        <img class="default-img" src="assets/imgs/shop/product-2-1.jpg"
                                                             alt=""/>
                                                        <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg"
                                                             alt=""/>
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up"
                                                       data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                            class="fi-rs-search"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                       href="shop-wishlist.html" tabindex="0"><i
                                                            class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up"
                                                       href="shop-compare.html" tabindex="0"><i
                                                            class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Hot</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="shop-product-right.html" tabindex="0">Ulstra Bass
                                                        Headphone</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span> </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>$238.85 </span>
                                                    <span class="old-price">$245.8</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html" tabindex="0">
                                                        <img class="default-img" src="assets/imgs/shop/product-3-1.jpg"
                                                             alt=""/>
                                                        <img class="hover-img" src="assets/imgs/shop/product-4-2.jpg"
                                                             alt=""/>
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up"
                                                       data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                            class="fi-rs-search"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                       href="shop-wishlist.html" tabindex="0"><i
                                                            class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up"
                                                       href="shop-compare.html" tabindex="0"><i
                                                            class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="sale">-12%</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="shop-product-right.html" tabindex="0">Smart Bluetooth
                                                        Speaker</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span> </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>$138.85 </span>
                                                    <span class="old-price">$145.8</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html" tabindex="0">
                                                        <img class="default-img" src="assets/imgs/shop/product-4-1.jpg"
                                                             alt=""/>
                                                        <img class="hover-img" src="assets/imgs/shop/product-4-2.jpg"
                                                             alt=""/>
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up"
                                                       data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                            class="fi-rs-search"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                       href="shop-wishlist.html" tabindex="0"><i
                                                            class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up"
                                                       href="shop-compare.html" tabindex="0"><i
                                                            class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="new">New</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="shop-product-right.html" tabindex="0">HomeSpeak 12UEA
                                                        Goole</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span> </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>$738.85 </span>
                                                    <span class="old-price">$1245.8</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6 d-lg-block d-none">
                                        <div class="product-cart-wrap hover-up mb-0">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html" tabindex="0">
                                                        <img class="default-img" src="assets/imgs/shop/product-5-1.jpg"
                                                             alt=""/>
                                                        <img class="hover-img" src="assets/imgs/shop/product-3-2.jpg"
                                                             alt=""/>
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up"
                                                       data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                            class="fi-rs-search"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                       href="shop-wishlist.html" tabindex="0"><i
                                                            class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up"
                                                       href="shop-compare.html" tabindex="0"><i
                                                            class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Hot</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="shop-product-right.html" tabindex="0">Dadua Camera 4K
                                                        2021EF</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span> </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>$89.8 </span>
                                                    <span class="old-price">$98.8</span>
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
        </div>
    </main>
</x-layouts.app>
