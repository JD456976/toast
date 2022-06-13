<template>
    <Head>
        <title>Welcome</title>
        <meta name="description" content="Welcome">
    </Head>
    <div class="page-content pt-20 pb-150">
        <div class="container">
            <main class="main">
                <div class="container mb-30">
                    <div class="row">
                        <div class="col-lg-4-5">
                            <section class="product-tabs section-padding position-relative">
                                <div class="section-title style-2">
                                    <h3>Featured Deals</h3>
                                    <ul class="nav nav-tabs links" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab"
                                                    data-bs-target="#tab-one" type="button" role="tab"
                                                    aria-controls="tab-one"
                                                    aria-selected="true">All
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab"
                                                    data-bs-target="#tab-two" type="button" role="tab"
                                                    aria-controls="tab-two"
                                                    aria-selected="false">Milks & Dairies
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab"
                                                    data-bs-target="#tab-three" type="button" role="tab"
                                                    aria-controls="tab-three" aria-selected="false">Coffes & Teas
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="nav-tab-four" data-bs-toggle="tab"
                                                    data-bs-target="#tab-four" type="button" role="tab"
                                                    aria-controls="tab-four"
                                                    aria-selected="false">Pet Foods
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="nav-tab-five" data-bs-toggle="tab"
                                                    data-bs-target="#tab-five" type="button" role="tab"
                                                    aria-controls="tab-five"
                                                    aria-selected="false">Meats
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="nav-tab-six" data-bs-toggle="tab"
                                                    data-bs-target="#tab-six" type="button" role="tab"
                                                    aria-controls="tab-six"
                                                    aria-selected="false">Vegetables
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="nav-tab-seven" data-bs-toggle="tab"
                                                    data-bs-target="#tab-seven" type="button" role="tab"
                                                    aria-controls="tab-seven" aria-selected="false">Fruits
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <!--End nav-tabs-->

                                <div class="tab-content" id="myTabContent">
                                    <DataView :value="featured" :layout="layout" :paginator="true" :rows="9"
                                              :sortOrder="sortOrder" :sortField="sortField">
                                        <template #header>
                                            <div class="grid grid-nogutter">
                                                <div class="col-6" style="text-align: left">
                                                    <Dropdown v-model="sortKey" :options="sortOptions"
                                                              optionLabel="label"
                                                              placeholder="Sort By Price"
                                                              @change="onSortChange($event)" />
                                                </div>
                                                <div class="col-6" style="text-align: right">
                                                    <DataViewLayoutOptions v-model="layout" />
                                                </div>
                                            </div>
                                        </template>

                                        <template #list="slotProps">
                                            <div class="col-12">
                                                <div class="product-list-item">
                                                    <Link :href="$route('deal.show', slotProps.data.slug)">
                                                        <img class="align-self-center"
                                                             src="https://www.primefaces.org/wp-content/uploads/2020/05/placeholder.png"
                                                             :alt="slotProps.data.title" />
                                                    </Link>
                                                    <div class="product-list-detail">
                                                        <div class="product-name">
                                                            <Link :href="$route('deal.show', slotProps.data.slug)">
                                                                <h6>{{ slotProps.data.title }}</h6>
                                                            </Link>
                                                        </div>
                                                        <Rating v-model="slotProps.data.initial" :readonly="true"
                                                                :cancel="false"></Rating>
                                                        <i class="pi pi-tag product-category-icon"></i><span
                                                        class="product-category">{{ slotProps.data.store.name }}</span>
                                                    </div>
                                                    <div class="product-list-action">
                                                                <span class="product-price">${{ slotProps.data.price
                                                                    }}</span>
                                                        <Badge v-if="slotProps.data.is_featured" value="Featured" severity="danger"></Badge>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>

                                        <template #grid="slotProps">
                                            <div class="col-12 md:col-4">
                                                <div class="product-grid-item card">
                                                    <div class="product-grid-item-top">
                                                        <Badge v-if="slotProps.data.is_featured" value="Featured" severity="danger"></Badge>
                                                        <div class="float-end">
                                                            <i class="pi pi-tag product-category-icon"></i>
                                                            <span
                                                                class="product-category">{{ slotProps.data.store.name
                                                                }}</span>
                                                        </div>

                                                    </div>
                                                    <div class="product-grid-item-content">
                                                        <Link :href="$route('deal.show', slotProps.data.slug)">
                                                            <img class="d-block mx-auto"
                                                                 src="https://www.primefaces.org/wp-content/uploads/2020/05/placeholder.png"
                                                                 :alt="slotProps.data.title" />
                                                        </Link>
                                                        <div class="product-name">
                                                            <Link :href="$route('deal.show', slotProps.data.slug)">
                                                                <h6>{{ slotProps.data.title }}</h6>
                                                            </Link>
                                                        </div>
                                                        <div class="mx-auto" style="width: 125px;">
                                                            <Rating v-model="slotProps.data.initial"
                                                                    :readonly="true"
                                                                    :cancel="false">

                                                            </Rating>
                                                        </div>
                                                    </div>
                                                    <div class="product-grid-item-bottom">
                                                        <span class="product-price">${{ slotProps.data.price }}</span>
                                                        <div>
                                                            <span>Posted: {{ slotProps.data.created_at }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </DataView>
                                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel"
                                         aria-labelledby="tab-one">
                                        <div class="row product-grid-4">

<!--                                            <div v-for="item in featured" :key="item.id"-->
<!--                                                 class="col-lg-1-5 col-md-4 col-12 col-sm-6">-->
<!--                                                <div class="product-cart-wrap mb-30">-->
<!--                                                    <div class="product-img-action-wrap">-->
<!--                                                        <div class="product-img product-img-zoom">-->
<!--                                                            <a href="shop-product-right.html">-->
<!--                                                                <img class="default-img"-->
<!--                                                                     src="assets/imgs/shop/product-1-1.jpg"-->
<!--                                                                     alt="" />-->
<!--                                                                <img class="hover-img"-->
<!--                                                                     src="assets/imgs/shop/product-1-2.jpg"-->
<!--                                                                     alt="" />-->
<!--                                                            </a>-->
<!--                                                        </div>-->
<!--                                                        <div class="product-action-1">-->
<!--                                                            <a aria-label="Add To Wishlist" class="action-btn"-->
<!--                                                               href="#"><i-->
<!--                                                                class="fi-rs-heart"></i></a>-->
<!--                                                            <a aria-label="Compare" class="action-btn"-->
<!--                                                               href="shop-compare.html"><i-->
<!--                                                                class="fi-rs-shuffle"></i></a>-->
<!--                                                            <a aria-label="Quick view" class="action-btn"-->
<!--                                                               data-bs-toggle="modal"-->
<!--                                                               data-bs-target="#quickViewModal"><i-->
<!--                                                                class="fi-rs-eye"></i></a>-->
<!--                                                        </div>-->
<!--                                                        <div-->
<!--                                                            class="product-badges product-badges-position product-badges-mrg">-->
<!--                                                            <span class="hot">Hot</span>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="product-content-wrap">-->
<!--                                                        <div class="product-category">-->
<!--                                                            <a href="shop-grid-right.html">{{ item.product.name-->
<!--                                                                }}</a>-->
<!--                                                        </div>-->
<!--                                                        <h2>-->
<!--                                                            <Link :href="$route('deal.show',item.slug)">-->
<!--                                                                {{ item.title }}-->
<!--                                                            </Link>-->
<!--                                                        </h2>-->
<!--                                                        <div class="product-rate-cover">-->
<!--                                                            <div class="rating">-->
<!--                                                                <Rating :cancel="false" :readonly="true"-->
<!--                                                                        v-model="item.initial" />-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                        <div>-->
<!--                                                    <span class="font-small text-muted">At <a-->
<!--                                                        href="vendor-details-1.html">{{ item.store.name }}</a></span>-->
<!--                                                        </div>-->
<!--                                                        <div class="product-card-bottom">-->
<!--                                                            <div class="product-price">-->
<!--                                                                <span>{{ item.discount }}</span>-->
<!--                                                                <span class="old-price">{{ item.price }}</span>-->
<!--                                                            </div>-->
<!--                                                            <div class="add-cart">-->
<!--                                                                <a class="add" href="shop-cart.html"><i-->
<!--                                                                    class="fi-rs-shopping-cart mr-5"></i>Add </a>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
                                            <!--end product card-->
                                        </div>
                                        <!--End product-grid-4-->
                                    </div>
                                </div>
                                <!--End tab-content-->
                            </section>
                        </div>
                        <div class="col-lg-1-5 primary-sidebar sticky-sidebar pt-30">
                            <categories />

                            <new />
                        </div>
                    </div>
                </div>
                <section class="popular-categories section-padding">
                    <div class="container">
                        <div class="section-title">
                            <div class="title">
                                <h3>Shop by Categories</h3>
                                <a class="show-all" href="shop-grid-right.html">
                                    All Categories
                                    <i class="fi-rs-angle-right"></i>
                                </a>
                            </div>
                            <div class="slider-arrow slider-arrow-2 flex-right carausel-8-columns-arrow"
                                 id="carausel-8-columns-arrows"></div>
                        </div>
                        <div class="carausel-8-columns-cover position-relative">
                            <div class="carausel-8-columns" id="carausel-8-columns">
                                <div class="card-1">
                                    <figure class="img-hover-scale overflow-hidden">
                                        <a href="shop-grid-right.html"><img
                                            src="assets/imgs/theme/icons/category-1.svg"
                                            alt="" /></a>
                                    </figure>
                                    <h6>
                                        <a href="shop-grid-right.html">Milks and <br />Dairies</a>
                                    </h6>
                                </div>
                                <div class="card-1">
                                    <figure class="img-hover-scale overflow-hidden">
                                        <a href="shop-grid-right.html"><img
                                            src="assets/imgs/theme/icons/category-2.svg"
                                            alt="" /></a>
                                    </figure>
                                    <h6>
                                        <a href="shop-grid-right.html"
                                        >Wines & <br />
                                            Alcohol</a
                                        >
                                    </h6>
                                </div>
                                <div class="card-1">
                                    <figure class="img-hover-scale overflow-hidden">
                                        <a href="shop-grid-right.html"><img
                                            src="assets/imgs/theme/icons/category-3.svg"
                                            alt="" /></a>
                                    </figure>
                                    <h6>
                                        <a href="shop-grid-right.html">Clothing & <br />Beauty</a>
                                    </h6>
                                </div>
                                <div class="card-1">
                                    <figure class="img-hover-scale overflow-hidden">
                                        <a href="shop-grid-right.html"><img
                                            src="assets/imgs/theme/icons/category-4.svg"
                                            alt="" /></a>
                                    </figure>
                                    <h6>
                                        <a href="shop-grid-right.html">Pet Foods <br />& Toy</a>
                                    </h6>
                                </div>
                                <div class="card-1">
                                    <figure class="img-hover-scale overflow-hidden">
                                        <a href="shop-grid-right.html"><img
                                            src="assets/imgs/theme/icons/category-5.svg"
                                            alt="" /></a>
                                    </figure>
                                    <h6>
                                        <a href="shop-grid-right.html">Packaged <br />fast food</a>
                                    </h6>
                                </div>
                                <div class="card-1">
                                    <figure class="img-hover-scale overflow-hidden">
                                        <a href="shop-grid-right.html"><img
                                            src="assets/imgs/theme/icons/category-6.svg"
                                            alt="" /></a>
                                    </figure>
                                    <h6>
                                        <a href="shop-grid-right.html">Baking <br />material</a>
                                    </h6>
                                </div>
                                <div class="card-1">
                                    <figure class="img-hover-scale overflow-hidden">
                                        <a href="shop-grid-right.html"><img
                                            src="assets/imgs/theme/icons/category-7.svg"
                                            alt="" /></a>
                                    </figure>
                                    <h6>
                                        <a href="shop-grid-right.html">Vegetables <br />& tubers</a>
                                    </h6>
                                </div>
                                <div class="card-1">
                                    <figure class="img-hover-scale overflow-hidden">
                                        <a href="shop-grid-right.html"><img
                                            src="assets/imgs/theme/icons/category-8.svg"
                                            alt="" /></a>
                                    </figure>
                                    <h6>
                                        <a href="shop-grid-right.html">Fresh <br />Seafood</a>
                                    </h6>
                                </div>
                                <div class="card-1">
                                    <figure class="img-hover-scale overflow-hidden">
                                        <a href="shop-grid-right.html"><img
                                            src="assets/imgs/theme/icons/category-9.svg"
                                            alt="" /></a>
                                    </figure>
                                    <h6>
                                        <a href="shop-grid-right.html">Noodles <br />Rice</a>
                                    </h6>
                                </div>
                                <div class="card-1">
                                    <figure class="img-hover-scale overflow-hidden">
                                        <a href="shop-grid-right.html"><img
                                            src="assets/imgs/theme/icons/category-10.svg"
                                            alt="" /></a>
                                    </figure>
                                    <h6><a href="shop-grid-right.html">Fastfood</a></h6>
                                </div>
                                <div class="card-1">
                                    <figure class="img-hover-scale overflow-hidden">
                                        <a href="shop-grid-right.html"><img
                                            src="assets/imgs/theme/icons/category-11.svg"
                                            alt="" /></a>
                                    </figure>
                                    <h6><a href="shop-grid-right.html">Ice cream</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--End category slider-->
                <section class="section-padding mb-30">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0">
                                <h4 class="section-title style-1 mb-30 animated animated">Top Selling</h4>
                                <div class="product-list-small animated animated">
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img
                                                src="assets/imgs/shop/thumbnail-1.jpg"
                                                alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">Nestle Original Coffee-Mate Coffee
                                                    Creamer</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img
                                                src="assets/imgs/shop/thumbnail-2.jpg"
                                                alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">Nestle Original Coffee-Mate Coffee
                                                    Creamer</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img
                                                src="assets/imgs/shop/thumbnail-3.jpg"
                                                alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">Nestle Original Coffee-Mate Coffee
                                                    Creamer</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0">
                                <h4 class="section-title style-1 mb-30 animated animated">Trending Products</h4>
                                <div class="product-list-small animated animated">
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img
                                                src="assets/imgs/shop/thumbnail-4.jpg"
                                                alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">Organic Cage-Free Grade A Large
                                                    Brown Eggs</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img
                                                src="assets/imgs/shop/thumbnail-5.jpg"
                                                alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">Seeds of Change Organic Quinoa,
                                                    Brown, & Red
                                                    Rice</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img
                                                src="assets/imgs/shop/thumbnail-6.jpg"
                                                alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">Naturally Flavored Cinnamon
                                                    Vanilla Light
                                                    Roast Coffee</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block">
                                <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                                <div class="product-list-small animated animated">
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img
                                                src="assets/imgs/shop/thumbnail-7.jpg"
                                                alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">Pepperidge Farm Farmhouse Hearty
                                                    White
                                                    Bread</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img
                                                src="assets/imgs/shop/thumbnail-8.jpg"
                                                alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">Organic Frozen Triple Berry
                                                    Blend</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img
                                                src="assets/imgs/shop/thumbnail-9.jpg"
                                                alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">Oroweat Country Buttermilk
                                                    Bread</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block">
                                <h4 class="section-title style-1 mb-30 animated animated">Top Rated</h4>
                                <div class="product-list-small animated animated">
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img
                                                src="assets/imgs/shop/thumbnail-10.jpg"
                                                alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">Foster Farms Takeout Crispy
                                                    Classic Buffalo
                                                    Wings</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img
                                                src="assets/imgs/shop/thumbnail-11.jpg"
                                                alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">Angie’s Boomchickapop Sweet &
                                                    Salty Kettle
                                                    Corn</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="row align-items-center hover-up">
                                        <figure class="col-md-4 mb-0">
                                            <a href="shop-product-right.html"><img
                                                src="assets/imgs/shop/thumbnail-12.jpg"
                                                alt="" /></a>
                                        </figure>
                                        <div class="col-md-8 mb-0">
                                            <h6>
                                                <a href="shop-product-right.html">All Natural Italian-Style Chicken
                                                    Meatballs</a>
                                            </h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$32.85</span>
                                                <span class="old-price">$33.8</span>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--End 4 columns-->
            </main>
        </div>
    </div>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Breadcrumbs from "@/Partials/Breadcrumbs";
import SiteHeader from "@/Partials/SiteHeader";
import SiteFooter from "@/Partials/SiteFooter";
import Categories from "@/Shared/HomeWidgets/Categories";
import Filter from "@/Shared/HomeWidgets/Filter";
import New from "@/Shared/HomeWidgets/New";
import Rating from "primevue/rating";
import DataView from "primevue/dataview";
import Dropdown from "primevue/dropdown";
import DataViewLayoutOptions from "primevue/dataviewlayoutoptions";
import Button from "primevue/button";
import Badge from "primevue/badge";


export default {
    name: "Index",
    data() {
        return {
            layout: "grid",
            sortKey: null,
            sortOrder: null,
            sortField: null,
            sortOptions: [
                { label: "Price High to Low", value: "!price" },
                { label: "Price Low to High", value: "price" },
            ]
        };
    },
    components: {
        New,
        Filter,
        Categories,
        SiteFooter,
        SiteHeader,
        Link,
        Head,
        Breadcrumbs,
        Rating,
        DataView,
        Dropdown,
        DataViewLayoutOptions,
        Button,
        Badge

    },
    props: {
        featured: Array,
        deals: Array,
        headerMenu: Array,
        footerMenu: Array,
        auth: Object,
        admin: Boolean,
        loggedin: Boolean,
        unseen: Number,
        points: Number,
        watchlistCount: Number,
        initial: Number
    },
    methods: {
        onSortChange(event) {
            const value = event.value.value;
            const sortValue = event.value;

            if (value.indexOf("!") === 0) {
                this.sortOrder = -1;
                this.sortField = value.substring(1, value.length);
                this.sortKey = sortValue;
            } else {
                this.sortOrder = 1;
                this.sortField = value;
                this.sortKey = sortValue;
            }
        }
    }
};
</script>

<style lang="css" scoped>
.card {
    background: #ffffff;
    padding: 2rem;
    box-shadow: 0 2px 1px -1px rgba(0,0,0,.2), 0 1px 1px 0 rgba(0,0,0,.14), 0 1px 3px 0 rgba(0,0,0,.12);
    border-radius: 4px;
    margin-bottom: 2rem;
}
.p-dropdown {
    width: 14rem;
    font-weight: normal;
}

.product-name {
    font-size: 1.5rem;
    font-weight: 700;
}

.product-description {
    margin: 0 0 1rem 0;
}

.product-category-icon {
    vertical-align: middle;
    margin-right: .5rem;
}

.product-category {
    font-weight: 600;
    vertical-align: middle;
}

::v-deep(.product-list-item) {
    display: flex;
    align-items: center;
    padding: 1rem;
    width: 100%;

    img {
        width: 50px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        margin-right: 2rem;
    }

    .product-list-detail {
        flex: 1 1 0;
    }

    .p-rating {
        margin: 0 0 .5rem 0;
    }

    .product-price {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: .5rem;
        align-self: flex-end;
    }

    .product-list-action {
        display: flex;
        flex-direction: column;
    }

    .p-button {
        margin-bottom: .5rem;
    }
}

::v-deep(.product-grid-item) {
    margin: .5rem;
    border: 1px solid var(--surface-border);

    .product-grid-item-top,
    .product-grid-item-bottom {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    img {
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        margin: 2rem 0;
    }

    .product-grid-item-content {
        text-align: center;
    }

    .product-price {
        font-size: 1.5rem;
        font-weight: 600;
    }
}

@media screen and (max-width: 576px) {
    .product-list-item {
        flex-direction: column;
        align-items: center;

        img {
            margin: 2rem 0;
        }

        .product-list-detail {
            text-align: center;
        }

        .product-price {
            align-self: center;
        }

        .product-list-action {
            display: flex;
            flex-direction: column;
        }

        .product-list-action {
            margin-top: 2rem;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }
    }
}
</style>
