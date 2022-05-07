<template>
    <Head>
        <title>Your Watchlist</title>
        <meta name="description" content="Your Watchlist">
    </Head>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Shop <span></span> Fillter
                </div>
            </div>
        </div>
        <div class="container mb-30 mt-50">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="mb-50">
                        <flash-messages />
                        <h1 class="heading-2 mb-10">Your Watchlist</h1>
                        <h6 class="text-body">There are <span
                            class="text-brand">{{ active.length + inactive.length }} </span> products in your list
                        </h6>
                    </div>
                    <div class="row">
                        <div class="col mb-5">
                            <h5>Active Items</h5>
                        </div>
                    </div>
                    <div class="shopping-summery">
                        <div class="row">
                            <div class="col">
                                <h6 v-if="active.length <= 0">No Active Items to Display</h6>
                            </div>
                        </div>
                        <table class="table table-wishlist">
                            <thead>
                            <tr class="main-heading">
                                <th class="custome-checkbox start pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                           id="exampleCheckbox11" value="" />
                                    <label class="form-check-label" for="exampleCheckbox11"></label>
                                </th>
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock Status</th>
                                <th scope="col">Action</th>
                                <th scope="col" class="end">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="item in active" :key="item.id" class="pt-30">
                                <td class="custome-checkbox pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                           id="exampleCheckbox1" value="" />
                                    <label class="form-check-label" for="exampleCheckbox1"></label>
                                </td>
                                <td class="image product-thumbnail pt-40"><img
                                    src="assets/imgs/shop/product-1-1.jpg" alt="#" /></td>
                                <td class="product-des product-name">
                                    <h6><a class="product-name mb-10"
                                           href="shop-product-right.html">{{ item.product.name }}</a></h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                </td>
                                <td class="price" data-title="Price">
                                    <h3 class="text-brand">{{ item.product.price }}</h3>
                                </td>
                                <td class="text-center detail-info" data-title="Stock">
                                    <span class="stock-status in-stock mb-0"> In Stock </span>
                                </td>
                                <td class="text-right" data-title="Deactivate">
                                    <Link class="btn" :href="$route('watchlist.deactivate',item.id)"
                                          method="post"
                                          as="button" type="button">Deactivate
                                    </Link>
                                </td>
                                <td class="text-center">
                                    <Link class="btn" :href="$route('watchlist.delete',item.id)"
                                          method="post"
                                          as="button" type="button">Delete
                                    </Link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-50">
                        <div class="col mb-5">
                            <h5>Inactive Items</h5>
                        </div>
                    </div>
                    <div class=" shopping-summery">
                        <div class="row">
                            <div class="col">
                                <h6 v-if="inactive.length <=0">No Inactive Items to Display</h6>
                            </div>
                        </div>
                        <table class="table table-wishlist">
                            <thead>
                            <tr class="main-heading">
                                <th class="custome-checkbox start pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                           id="exampleCheckbox11" value="" />
                                    <label class="form-check-label" for="exampleCheckbox11"></label>
                                </th>
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock Status</th>
                                <th scope="col">Action</th>
                                <th scope="col" class="end">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="item in inactive" :key="item.id" class="pt-30">
                                <td class="custome-checkbox pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                           id="exampleCheckbox1" value="" />
                                    <label class="form-check-label" for="exampleCheckbox1"></label>
                                </td>
                                <td class="image product-thumbnail pt-40"><img
                                    src="assets/imgs/shop/product-1-1.jpg" alt="#" /></td>
                                <td class="product-des product-name">
                                    <h6><a class="product-name mb-10"
                                           href="shop-product-right.html">{{ item.product.name }}</a></h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                </td>
                                <td class="price" data-title="Price">
                                    <h3 class="text-brand">{{ item.product.price }}</h3>
                                </td>
                                <td class="text-center detail-info" data-title="Stock">
                                    <span class="stock-status in-stock mb-0"> In Stock </span>
                                </td>
                                <td class="text-right" data-title="Actviate">
                                    <Link class="btn" :href="$route('watchlist.activate',item.id)"
                                          method="post"
                                          as="button" type="button">Activate
                                    </Link>
                                </td>
                                <td class="action text-center">
                                    <Link class="btn" :href="$route('watchlist.delete',item.id)"
                                          method="post"
                                          as="button" type="button">Delete
                                    </Link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import FlashMessages from "../../Shared/FlashMessages";

export default {
    name: "Index",
    components: {
        Head,
        FlashMessages
    },
    props: {
        inactive: Array,
        active: Array
    }
};
</script>
