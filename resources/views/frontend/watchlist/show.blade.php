<x-layouts.app>
    <x-slot:title>
        Your Watchlist
    </x-slot:title>
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
                        <h1 class="heading-2 mb-10">Your Watchlist</h1>
                        <h6 class="text-body">There are <span class="text-brand">{{ $currentUser->watchlistCount() }} </span> products in your list</h6>
                    </div>
                    <div class="row">
                        <div class="col mb-5">
                            <h5>Active Items</h5>
                        </div>
                    </div>
                    <div class="table-responsive shopping-summery">
                        @if (count($active) == 0)
                            <div class="row">
                                <div class="col">
                                    <h6>No Active Items to Display</h6>
                                </div>
                            </div>
                        @else
                        <table class="table table-wishlist">
                            <thead>
                            <tr class="main-heading">
                                <th class="custome-checkbox start pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="" />
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
                            @foreach ($active as $item)
                                <tr class="pt-30">
                                    <td class="custome-checkbox pl-30">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                        <label class="form-check-label" for="exampleCheckbox1"></label>
                                    </td>
                                    <td class="image product-thumbnail pt-40"><img src="assets/imgs/shop/product-1-1.jpg" alt="#" /></td>
                                    <td class="product-des product-name">
                                        <h6><a class="product-name mb-10" href="shop-product-right.html">{{ $item->product->name }}</a></h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                    </td>
                                    <td class="price" data-title="Price">
                                        <h3 class="text-brand">{{ $item->product->productPrice() }}</h3>
                                    </td>
                                    <td class="text-center detail-info" data-title="Stock">
                                        <span class="stock-status in-stock mb-0"> In Stock </span>
                                    </td>
                                    <td class="text-right" data-title="Deactivate">
                                        <a href="{{ route('watchlist.deactivate', $item->id) }}"><button class="btn btn-sm">Deactivate</button></a>
                                    </td>
                                    <td class="action text-center" data-title="Remove">
                                        {!! Form::open(['route' => ['watchlist.destroy', $item->id],'method' => 'delete']) !!}
                                        {!! Form::submit('Remove', ['class' => 'btn btn-sm btn-primary']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                    <div class="row mt-50">
                        <div class="col mb-5">
                            <h5>Inactive Items</h5>
                        </div>
                    </div>
                    <div class="table-responsive shopping-summery">
                        @if (count($inactive) == 0)
                            <div class="row">
                                <div class="col">
                                    <h6>No Inactive Items to Display</h6>
                                </div>
                            </div>
                        @else
                            <table class="table table-wishlist">
                                <thead>
                                <tr class="main-heading">
                                    <th class="custome-checkbox start pl-30">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="" />
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
                                @foreach ($inactive as $item)
                                    <tr class="pt-30">
                                        <td class="custome-checkbox pl-30">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                            <label class="form-check-label" for="exampleCheckbox1"></label>
                                        </td>
                                        <td class="image product-thumbnail pt-40"><img src="assets/imgs/shop/product-1-1.jpg" alt="#" /></td>
                                        <td class="product-des product-name">
                                            <h6><a class="product-name mb-10" href="shop-product-right.html">{{ $item->product->name }}</a></h6>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                        </td>
                                        <td class="price" data-title="Price">
                                            <h3 class="text-brand">{{ $item->product->productPrice() }}</h3>
                                        </td>
                                        <td class="text-center detail-info" data-title="Stock">
                                            <span class="stock-status in-stock mb-0"> In Stock </span>
                                        </td>
                                        <td class="text-right" data-title="Actviate">
                                            <a href="{{ route('watchlist.activate', $item->id) }}"><button class="btn btn-sm">Activate</button></a>
                                        </td>
                                        <td class="action text-center" data-title="Remove">
                                           {!! Form::open(['route' => ['watchlist.destroy', $item->id],'method' => 'delete']) !!}
                                           	    {!! Form::submit('Remove', ['class' => 'btn btn-sm btn-primary']) !!}
                                           {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layouts.app>
