<template>
    <Head>
        <title>Viewing Deal: {{ deal.title }}</title>
        <meta name="description" content="Viewing Deal" />
    </Head>
    <div class="container mb-30">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <div class="product-detail accordion-detail">
                    <div class="row mb-50 mt-30">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <h5 v-if="media.length <=0">No Images Currently</h5>
                            <div v-else class="detail-gallery">
                                <Galleria :value="images" :responsiveOptions="responsiveOptions" :numVisible="5"
                                          containerStyle="max-width: 640px">
                                    <template #item="slotProps">
                                        <img :src="slotProps.item.itemImageSrc" :alt="slotProps.item.alt"
                                             style="width: 100%" />
                                    </template>
                                    <template #thumbnail="slotProps">
                                        <img :src="slotProps.item.thumbnailImageSrc" :alt="slotProps.item.alt" />
                                    </template>
                                </Galleria>
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <figure v-for="image in media" :key="image.id" class="border-radius-10">
                                        <img src="{{ image.file_name }}" alt="product image" />
                                    </figure>
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails">
                                    <div v-for="image in media" :key="image.id">
                                        <img src="{{ image.file_name }}" alt="product image" />
                                    </div>
                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <flash-messages />
                            <div class="detail-info pr-30 pl-30">
                                <span class="stock-status out-stock"> Sale Off </span>
                                <div class="row justify-content-end">
                                    <div v-if="loggedin" class="row justify-content-center mb-10">
                                        <div v-if="admin" class="text-center">
                                            <Button v-tooltip.top="'Admin Panel'"
                                                    v-ripple
                                                    icon="pi pi-lock"
                                                    @click="visibleRight = true"
                                                    class="mr-2 p-ripple" />
                                            <Sidebar v-model:visible="visibleRight" :baseZIndex="10000"
                                                     position="right">
                                                <h3>Admin Panel</h3>
                                                <div>
                                                    <Link
                                                        class="btn btn-sm"
                                                        :href="$route('admin.deal.edit',deal.id)"
                                                        method="get"
                                                        as="button" type="button">Edit Deal
                                                    </Link>
                                                    <Link
                                                        v-if="deal.is_featured == 1"
                                                        class="btn btn-sm"
                                                        :href="$route('deal.unfeature',deal.id)"
                                                        method="post"
                                                        as="button" type="button">Unfeature Deal
                                                    </Link>
                                                    <Link
                                                        v-else
                                                        class="btn btn-sm"
                                                        :href="$route('deal.feature',deal.id)"
                                                        method="post"
                                                        as="button" type="button">Feature Deal
                                                    </Link>
                                                    <Link
                                                        v-if="deal.is_active == 1"
                                                        class="btn btn-sm"
                                                        :href="$route('deal.unapprove',deal.id)"
                                                        method="post"
                                                        as="button" type="button">Unapprove Deal
                                                    </Link>
                                                    <Link
                                                        v-else
                                                        class="btn btn-sm"
                                                        :href="$route('deal.approve',deal.id)"
                                                        method="post"
                                                        as="button" type="button">Approve Deal
                                                    </Link>
                                                    <Link
                                                        v-if="deal.is_frontpage == 1"
                                                        class="btn btn-sm"
                                                        :href="$route('deal.unfrontpage',deal.id)"
                                                        method="post"
                                                        as="button" type="button">Remove from Frontpage
                                                    </Link>
                                                    <Link
                                                        v-else
                                                        class="btn btn-sm"
                                                        :href="$route('deal.frontpage',deal.id)"
                                                        method="post"
                                                        as="button" type="button">Show on Frontpage
                                                    </Link>
                                                </div>
                                            </Sidebar>
                                        </div>
                                        <report-deal-form :deal="deal" />
                                    </div>
                                    <h2 class="title-detail">{{ deal.title }}</h2>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <span class="current-price text-brand">${{ deal.discount }}</span>
                                            <span>
                                                    <span class="save-price font-md color3 ml-15">26% Off</span>
                                                    <span
                                                        class="old-price font-md ml-15">${{ deal.price }}</span>
                                                </span>
                                        </div>
                                    </div>
                                    <div class="short-desc mb-30">
                                        <p class="font-lg">{{ deal.description }}</p>
                                    </div>
                                    <div>
                                        <div class="row justify-content-center mb-30">
                                            <h5 class="ml-50 mb-2">Rate this Deal:</h5>
                                            <rate-deal :deal="deal" :initial="initial" />
                                        </div>
                                    </div>
                                    <div class="detail-extralink mb-20">
                                        <div class="product-extra-link2">
                                            <div>
                                                <Link class="btn" :href="$route('watchlist.store',deal.product_id)"
                                                      method="post"
                                                      as="button" type="button">Add To Watchlist
                                                    <i class="fi-rs-heart"></i>
                                                </Link>
                                                <Link class="btn" :href="$route('follow.store',deal.user_id)"
                                                      method="post"
                                                      as="button" type="button">Follow User
                                                    <i class="fi-rs-add"></i>
                                                </Link>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="font-xs">
                                        <ul class="mr-50 float-start">
                                            <li class="mb-5">Posted By: <span class="text-brand"><a
                                                :href="$route('user.show',deal.user_id)"
                                                class="font-heading text-brand">{{ deal.user.name
                                                }}</a></span>
                                            </li>
                                            <li class="mb-5">Posted:<span
                                                class="text-brand"> {{ formatDate(deal.created_at) }}</span></li>
                                            <li>LIFE: <span class="text-brand">70 days</span></li>
                                        </ul>
                                        <ul class="float-start">
                                            <li class="mb-5">Brand: <a href="#">{{ deal.brand.name }}</a></li>
                                            <li class="mb-5">
                                                <!--                                            Tags: {{ $deal->tagList ? : "No Tags Yet" }}-->
                                            </li>
                                            <li>Stock:<span class="in-stock text-brand ml-5">8 Items In Stock</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="product-info">
                            <Panel header="Deal Info & Comments">
                                <TabView>
                                    <TabPanel header="Comments">
                                        <div class="comments-area">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="comment-list">
                                                        <h5 v-if="comments.length <= 0">No Comments To Display</h5>
                                                        <div v-else v-for="comment in comments" :key="comment.id"
                                                             class="single-comment justify-content-between d-flex animate__animated animate__jackInTheBox">
                                                            <div class="user justify-content-between d-flex">

                                                                <div class="thumb text-center">
                                                                    <a :href="$route('user.show',comment.user_id)"
                                                                       class="font-heading text-brand">{{
                                                                            comment.user.name
                                                                        }}</a>
                                                                </div>
                                                                <div class="desc">
                                                                    <div
                                                                        class="d-flex justify-content-between mb-10">
                                                                        <div class="d-flex align-items-center">
                                                                        <span
                                                                            class="font-xs text-muted">{{ comment.created_at
                                                                            }} </span>
                                                                        </div>
                                                                    </div>

                                                                    <p class="mb-10">
                                                                        {{ comment.comment }}
                                                                    </p>
                                                                    <ReportCommentForm :deal="deal"
                                                                                       :comment="comment" />
                                                                </div>
                                                            </div>
                                                            <small v-if="comment.is_reported === 1" class="p-error">This
                                                                comment was reported</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <deal-comment-form :deal="deal" />
                                    </TabPanel>
                                    <TabPanel header="Description">
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
                                            <hr class="wp-block-separator is-style-dots" />
                                            <p>Laconic overheard dear woodchuck wow this outrageously taut beaver hey
                                                hello far meadowlark imitatively egregiously hugged that yikes minimally
                                                unanimous pouted flirtatiously as beaver beheld above forward energetic
                                                across this jeepers beneficently cockily less a the raucously that magic
                                                upheld far so the this where crud then below after jeez enchanting
                                                drunkenly more much wow callously irrespective limpet.</p>
                                            <h4 class="mt-30">Packaging & Delivery</h4>
                                            <hr class="wp-block-separator is-style-wide" />
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
                                    </TabPanel>
                                    <TabPanel v-if="admin" header="Audit">
                                        <h5 class="mt-10 mb-20" v-if="audits.length <= 0">No
                                            Audits to Display</h5>
                                        <DataTable v-else showGridlines stripedRows :scrollable="true"
                                                   scrollDirection="both" :value="audits" responsiveLayout="scroll">
                                            <Column field="id" header="ID"></Column>
                                            <Column field="user.name" header="User"></Column>
                                            <Column field="old_title" header="Old Title"></Column>
                                            <Column field="new_title" header="New Title"></Column>
                                            <Column field="old_discount" header="Old Discount"></Column>
                                            <Column field="new_discount" header="New Discount"></Column>
                                            <Column field="old_price" header="Old Price"></Column>
                                            <Column field="new_price" header="New Price"></Column>
                                            <Column field="old_price_extras" header="Old Price Extras"></Column>
                                            <Column field="new_price_extras" header="New Price Extras"></Column>
                                            <Column field="old_link" header="Old Link"></Column>
                                            <Column field="new_link" header="New Link"></Column>
                                            <Column field="old_is_active" header="Old Is Active">
                                                <template #body="slotProps">
                                                    <Badge v-if="slotProps.data.old_is_active === 1"
                                                           value="Active" severity="success"
                                                           class="mr-2"></Badge>
                                                    <Badge v-else value="Inactive"
                                                           severity="danger" class="mr-2"></Badge>
                                                </template>
                                            </Column>
                                            <Column field="new_is_active" header="New Is Active">
                                                <template #body="slotProps">
                                                    <Badge v-if="slotProps.data.new_is_active === 1"
                                                           value="Active" severity="success"
                                                           class="mr-2"></Badge>
                                                    <Badge v-else value="Inactive"
                                                           severity="danger" class="mr-2"></Badge>
                                                </template>
                                            </Column>
                                            <Column field="old_is_frontpage" header="Old Frontpage">
                                                <template #body="slotProps">
                                                    <Badge v-if="slotProps.data.old_is_frontpage === 1"
                                                           value="Active" severity="success"
                                                           class="mr-2"></Badge>
                                                    <Badge v-else value="Inactive"
                                                           severity="danger" class="mr-2"></Badge>
                                                </template>
                                            </Column>
                                            <Column field="new_is_frontpage" header="New Frontpage">
                                                <template #body="slotProps">
                                                    <Badge v-if="slotProps.data.new_is_frontpage === 1"
                                                           value="Active" severity="success"
                                                           class="mr-2"></Badge>
                                                    <Badge v-else value="Inactive"
                                                           severity="danger" class="mr-2"></Badge>
                                                </template>
                                            </Column>
                                            <Column field="old_is_featured" header="Old Is Featured">
                                                <template #body="slotProps">
                                                    <Badge v-if="slotProps.data.old_is_featured === 1"
                                                           value="Active" severity="success"
                                                           class="mr-2"></Badge>
                                                    <Badge v-else value="Inactive"
                                                           severity="danger" class="mr-2"></Badge>
                                                </template>
                                            </Column>
                                            <Column field="new_is_featured" header="New Is Featured">
                                                <template #body="slotProps">
                                                    <Badge v-if="slotProps.data.new_is_featured === 1"
                                                           value="Active" severity="success"
                                                           class="mr-2"></Badge>
                                                    <Badge v-else value="Inactive"
                                                           severity="danger" class="mr-2"></Badge>
                                                </template>
                                            </Column>
                                            <Column field="old_description" header="Old Description"></Column>
                                            <Column field="new_description" header="New Description"></Column>
                                        </DataTable>
                                    </TabPanel>
                                    <TabPanel v-if="admin" header="Reports">
                                        <h5 class="mt-10 mb-20" v-if="reports.length <= 0">No
                                            Reports to Display</h5>
                                        <DataTable v-else showGridlines stripedRows :scrollable="true"
                                                   scrollDirection="both" :value="reports"
                                                   responsiveLayout="scroll">
                                            <Column field="id" header="ID"></Column>
                                            <Column field="user.name" header="Reported By"></Column>
                                            <Column field="reason" header="Reason"></Column>
                                            <Column field="comment" header="Comment"></Column>
                                            <Column field="created_at" header="Created On"></Column>
                                            <Column header="Resolve">
                                                <template #body="slotProps">
                                                    <Link class="nav-link"
                                                          method="patch"
                                                          :href="$route('admin.report.update',slotProps.data.id)">
                                                        <Button class="p-button-raised p-button-sm" label="Resolve"
                                                                icon="pi pi-check"
                                                                iconPos="right" />
                                                    </Link>

                                                </template>
                                            </Column>
                                        </DataTable>
                                    </TabPanel>
                                </TabView>
                            </Panel>
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
                                                         alt="" />
                                                    <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg"
                                                         alt="" />
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
                                                         alt="" />
                                                    <img class="hover-img" src="assets/imgs/shop/product-4-2.jpg"
                                                         alt="" />
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
                                                         alt="" />
                                                    <img class="hover-img" src="assets/imgs/shop/product-4-2.jpg"
                                                         alt="" />
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
                                                         alt="" />
                                                    <img class="hover-img" src="assets/imgs/shop/product-3-2.jpg"
                                                         alt="" />
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
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import DealCommentForm from "../../Shared/DealCommentForm";
import dayjs from "dayjs";
import Icon from "../../Shared/Icon";
import { computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import FlashMessages from "../../Shared/FlashMessages";
import ReportDealForm from "../../Shared/ReportDealForm";
import ReportCommentForm from "../../Shared/ReportDealCommentForm";
import RateDeal from "../../Shared/RateDeal";
import Sidebar from "primevue/sidebar";
import Button from "primevue/button";
import Tooltip from "primevue/tooltip";
import Panel from "primevue/panel";
import TabPanel from "primevue/tabpanel";
import TabView from "primevue/tabview";
import Badge from "primevue/badge";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Galleria from "primevue/galleria";
import Ripple from "primevue/ripple";

export default {
    setup() {
        const user = computed(() => usePage().props.value.auth.user);
        return {
            user
        };
    },
    data() {
        return {
            visibleRight: false
        };
    },
    directives: {
        "tooltip": Tooltip,
        "ripple": Ripple
    },
    name: "Show",
    props: {
        deal: Object,
        initial: Number,
        media: Object,
        admin: Boolean,
        loggedin: Boolean,
        audits: Array,
        reports: Array,
        comments: Array
    },
    components: {
        Head,
        DealCommentForm,
        ReportDealForm,
        ReportCommentForm,
        Icon,
        FlashMessages,
        RateDeal,
        Sidebar,
        Button,
        Panel,
        TabView,
        TabPanel,
        Badge,
        DataTable,
        Column,
        Link,
        Galleria,
        Ripple
    },
    methods: {
        formatDate(dateString) {
            const date = dayjs(dateString);
            // Then specify how you want your dates to be formatted
            return date.format("dddd MMMM D, YYYY");
        }
    }
};
</script>

<style scoped>

</style>
