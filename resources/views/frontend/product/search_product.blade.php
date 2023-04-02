@extends('frontend.main_master')
@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url({{ asset('frontend/images/page-header-bg.jpg') }})">
            <div class="container">
                <h1 class="page-title">Grid 3 Columns<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('/') }}">Anasayfa</a></li>
                    {{-- <li class="breadcrumb-item active" aria-current="page">{{ $products->search }}</li> --}}
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="toolbox">
                            <div class="toolbox-left">
                                <div class="toolbox-info">
                                    <span>{{ count($products) }}</span> Adet Ürün Bulundu
                                </div><!-- End .toolbox-info -->
                            </div><!-- End .toolbox-left -->

                            <div class="toolbox-right">
                                <div class="toolbox-sort">
                                    <label for="sortby">Sort by:</label>
                                    <div class="select-custom">
                                        <select name="sortby" id="sortby" class="form-control">
                                            <option value="popularity" selected="selected">Most Popular</option>
                                            <option value="rating">Most Rated</option>
                                            <option value="date">Date</option>
                                        </select>
                                    </div>
                                </div><!-- End .toolbox-sort -->
                                <div class="toolbox-layout">
                                    <a href="category-list.html" class="btn-layout">
                                        <svg width="16" height="10">
                                            <rect x="0" y="0" width="4" height="4" />
                                            <rect x="6" y="0" width="10" height="4" />
                                            <rect x="0" y="6" width="4" height="4" />
                                            <rect x="6" y="6" width="10" height="4" />
                                        </svg>
                                    </a>

                                    <a href="category-2cols.html" class="btn-layout">
                                        <svg width="10" height="10">
                                            <rect x="0" y="0" width="4" height="4" />
                                            <rect x="6" y="0" width="4" height="4" />
                                            <rect x="0" y="6" width="4" height="4" />
                                            <rect x="6" y="6" width="4" height="4" />
                                        </svg>
                                    </a>

                                    <a href="category.html" class="btn-layout active">
                                        <svg width="16" height="10">
                                            <rect x="0" y="0" width="4" height="4" />
                                            <rect x="6" y="0" width="4" height="4" />
                                            <rect x="12" y="0" width="4" height="4" />
                                            <rect x="0" y="6" width="4" height="4" />
                                            <rect x="6" y="6" width="4" height="4" />
                                            <rect x="12" y="6" width="4" height="4" />
                                        </svg>
                                    </a>

                                    <a href="category-4cols.html" class="btn-layout">
                                        <svg width="22" height="10">
                                            <rect x="0" y="0" width="4" height="4" />
                                            <rect x="6" y="0" width="4" height="4" />
                                            <rect x="12" y="0" width="4" height="4" />
                                            <rect x="18" y="0" width="4" height="4" />
                                            <rect x="0" y="6" width="4" height="4" />
                                            <rect x="6" y="6" width="4" height="4" />
                                            <rect x="12" y="6" width="4" height="4" />
                                            <rect x="18" y="6" width="4" height="4" />
                                        </svg>
                                    </a>
                                </div><!-- End .toolbox-layout -->
                            </div><!-- End .toolbox-right -->
                        </div><!-- End .toolbox -->

                        <div class="products mb-3">
                            <div class="row justify-content-center">

                                @foreach ($products as $product)
                                    @php
                                        $amount = $product->selling_price - $product->discount_price;
                                        $discount = ($amount / $product->selling_price) * 100;
                                    @endphp
                                    <div class="col-6 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">

                                            <figure class="product-media">



                                                @if ($product->advice_product == 1)
                                                    <span class="product-label label-circle label-top">Tavsiye</span>
                                                @else
                                                @endif

                                                @if ($product->new_product == 1)
                                                    <span class="product-label label-circle label-new">Yeni</span>
                                                @else
                                                @endif

                                                @if ($product->trend_product == 1)
                                                    <span class="product-label label-circle label-new">Trend</span>
                                                @else
                                                @endif

                                                @if ($product->discount_price == null)
                                                @else
                                                    <span class="product-label label-circle label-new">
                                                        {{ round($discount) }}%
                                                    </span>
                                                @endif


                                                <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                                    <img src="{{ asset($product->product_thambnail_photo) }}"
                                                        alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                        class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                                            wishlist</span></a>
                                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                                        title="Quick view"><span>Quick view</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                        title="Compare"><span>Compare</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}"
                                                        class="btn-product btn-cart" title="Ürün Detay"><span></span></a>
                                                    <a data-toggle="modal" data-target="#exampleModal"
                                                        id="{{ $product->id }}" onclick="productView(this.id)"
                                                        class="btn-product" title="Quick view"><i
                                                            class="fa fa-eye"></i></a>
                                                </div><!-- End .product-action -->

                                            </figure><!-- End .product-media -->


                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a
                                                        href="{{ url('product/category/' . $product['category']['id'] . '/' . $product['category']['category_slug']) }}">{{ $product['category']['category_name'] }}</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a
                                                        href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">{{ $product->product_name }}</a>
                                                </h3>
                                                <!-- End .product-title -->
                                                @if ($product->discount_price == null)
                                                    <div class="product-price">
                                                        {{ $product->selling_price }} TL
                                                    </div><!-- End .product-price -->
                                                @else
                                                    <div class="product-price">
                                                        <del class="text-danger pr-2"> {{ $product->selling_price }} TL
                                                        </del>
                                                        / {{ $product->discount_price }} TL

                                                    </div><!-- End .product-price -->
                                                @endif

                                                @php
                                                    $reviews = App\Models\Review::where('product_id', $product->id)
                                                        // ->where('status', 1)
                                                        ->latest()
                                                        ->get();
                                                @endphp

                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 0%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">({{ count($reviews) }} Yorum)</span>
                                                </div><!-- End .rating-container -->


                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 -->
                                @endforeach



                            </div><!-- End .row -->
                        </div><!-- End .products -->

                        {{-- {{ $products->links('vendor.pagination.default') }} --}}

                        {{-- <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link page-link-prev" href="#" aria-label="Previous"
                                        tabindex="-1" aria-disabled="true">
                                        <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                    </a>
                                </li>
                                <li class="page-item active" aria-current="page"><a class="page-link"
                                        href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item-total">of 6</li>
                                <li class="page-item">
                                    <a class="page-link page-link-next" href="#" aria-label="Next">
                                        Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </nav> --}}
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3 order-lg-first">
                        <div class="sidebar sidebar-shop">
                            <div class="widget widget-clean">
                                <label>Filters:</label>
                                <a href="#" class="sidebar-filter-clear">Clean All</a>
                            </div><!-- End .widget widget-clean -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                                        aria-controls="widget-1">
                                        Category
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-1">
                                    <div class="widget-body">
                                        <div class="filter-items filter-items-count">


                                            @foreach ($productcategories as $productcategorie)
                                                <div class="filter-item">
                                                    <a
                                                        href="{{ url('product/category/' . $productcategorie->id . '/' . $productcategorie->category_slug) }}">
                                                        <div class="custom-control custom-checkbox">
                                                            <label class="custom-control-label">
                                                                {{ $productcategorie->category_name }}
                                                            </label>
                                                        </div><!-- End .custom-checkbox -->
                                                    </a>

                                                </div><!-- End .filter-item -->
                                            @endforeach


                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->




                        </div><!-- End .sidebar sidebar-shop -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
