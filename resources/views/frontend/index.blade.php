@extends('frontend.main_master')
@section('content')
    <main class="main">
        <div class="intro-slider-container mb-5">
            <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl"
                data-owl-options='{
              "dots": true,
              "nav": false, 
              "responsive": {
                  "1200": {
                      "nav": true,
                      "dots": false
                  }
              }
          }'>


                @foreach ($sliders as $slider)
                    @php
                        $amount = $slider->selling_price - $slider->discount_price;
                        $discount = ($amount / $slider->selling_price) * 100;
                    @endphp



                    @if ($slider->type == 'İndirimli Ürün')
                        <div class="intro-slide" style="background-image: url({{ asset($slider->photo) }});">
                            <div class="container intro-content">
                                <div class="row justify-content-end">
                                    <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                        <h3 class="intro-subtitle text-third">İndirim</h3>
                                        <!-- End .h3 intro-subtitle -->
                                        <h1 class="intro-title">{{ $slider->title }}</h1>


                                        @if ($slider->discount_price != null)
                                            <div class="intro-price">
                                                <sup class="intro-old-price">{{ $slider->selling_price }} TL</sup>
                                                <span class="text-third">
                                                    {{ $slider->discount_price }} <sup>TL</sup>
                                                </span>
                                            </div><!-- End .intro-price -->
                                        @endif
                                        <a href="{{ $slider->link }}" target="_blank" class="btn btn-primary btn-round">
                                            <span>Ürünü Gör</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </a>
                                    </div><!-- End .col-lg-11 offset-lg-1 -->
                                </div><!-- End .row -->
                            </div><!-- End .intro-content -->
                        </div><!-- End .intro-slide -->
                    @else
                        <div class="intro-slide" style="background-image: url( {{ asset($slider->photo) }});">
                            <div class="container intro-content">
                                <div class="row justify-content-end">
                                    <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                        <h3 class="intro-subtitle text-primary">Yeni Ürün</h3>
                                        <!-- End .h3 intro-subtitle -->
                                        <h1 class="intro-title"> {{ $slider->title }} </h1>
                                        <!-- End .intro-title -->

                                        <div class="intro-price">
                                            <sup>Bugün:</sup>
                                            <span class="text-primary">
                                                {{ $slider->selling_price }} <sup>TL</sup>
                                            </span>


                                        </div><!-- End .intro-price -->

                                        <a href="{{ $slider->link }}" target="_blank" class="btn btn-primary btn-round">
                                            <span>Ürünü Gör</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </a>
                                    </div><!-- End .col-md-6 offset-md-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .intro-content -->
                        </div><!-- End .intro-slide -->
                    @endif
                @endforeach


            </div><!-- End .intro-slider owl-carousel owl-simple -->

            <span class="slider-loader"></span><!-- End .slider-loader -->
        </div><!-- End .intro-slider-container -->

        <div class="container">
            <h2 class="title text-center mb-4">Explore Popular Categories</h2><!-- End .title text-center -->


            <div class="cat-blocks-container">
                <div class="row">


                    @foreach ($productcategories as $productcategorie)
                        <div class="col-6 col-sm-4 col-lg-2">
                            <a href="{{ url('product/category/' . $productcategorie->id . '/' . $productcategorie->category_slug) }}"
                                class="cat-block">
                                <figure>
                                    <span>
                                        <img src="{{ asset($productcategorie->photo) }}" alt="Category image">
                                    </span>
                                </figure>

                                <h3 class="cat-block-title">{{ $productcategorie->category_name }}</h3>
                                <!-- End .cat-block-title -->
                            </a>
                        </div><!-- End .col-sm-4 col-lg-2 -->
                    @endforeach


                </div><!-- End .row -->
            </div><!-- End .cat-blocks-container -->
        </div><!-- End .container -->

        <div class="mb-4"></div><!-- End .mb-4 -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="banner banner-overlay banner-overlay-light">
                        <a href="#">
                            <img src="{{ asset('frontend/images/demos/demo-4/banners/banner-1.png') }}" alt="Banner">
                        </a>

                        <div class="banner-content">
                            <h4 class="banner-subtitle"><a href="#">Smart Offer</a></h4>
                            <!-- End .banner-subtitle -->
                            <h3 class="banner-title"><a href="#">Save $150 <strong>on Samsung <br>Galaxy
                                        Note9</strong></a></h3><!-- End .banner-title -->
                            <a href="#" class="banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-md-4 -->


                <div class="col-md-6 col-lg-4">
                    <div class="banner banner-overlay banner-overlay-light">
                        <a href="#">
                            <img src="{{ asset('frontend/images/demos/demo-4/banners/banner-2.jpg') }}" alt="Banner">
                        </a>

                        <div class="banner-content">
                            <h4 class="banner-subtitle"><a href="#">Time Deals</a></h4>
                            <!-- End .banner-subtitle -->
                            <h3 class="banner-title"><a href="#"><strong>Bose SoundSport</strong> <br>Time
                                    Deal -30%</a></h3><!-- End .banner-title -->
                            <a href="#" class="banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-md-4 -->

                <div class="col-md-6 col-lg-4">
                    <div class="banner banner-overlay banner-overlay-light">
                        <a href="#">
                            <img src="{{ asset('frontend/images/demos/demo-4/banners/banner-3.png') }}" alt="Banner">
                        </a>

                        <div class="banner-content">
                            <h4 class="banner-subtitle"><a href="#">Clearance</a></h4>
                            <!-- End .banner-subtitle -->
                            <h3 class="banner-title"><a href="#"><strong>GoPro - Fusion 360</strong>
                                    <br>Save $70</a></h3><!-- End .banner-title -->
                            <a href="#" class="banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-lg-4 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-3"></div><!-- End .mb-5 -->

        <div class="container new-arrivals">
            <div class="heading heading-flex mb-3">
                <div class="heading-left">
                    <h2 class="title">New Arrivals</h2><!-- End .title -->
                </div><!-- End .heading-left -->

                <div class="heading-right">
                    <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" id="new-all-link" data-toggle="tab" href="#new-all-tab"
                                role="tab" aria-controls="new-all-tab" aria-selected="true">All</a>
                        </li>

                        @foreach ($productcategories as $productcategorie)
                            <li class="nav-item">
                                <a class="nav-link" id="new-{{ $productcategorie->id }}-link" data-toggle="tab"
                                    href="#new-{{ $productcategorie->id }}-tab" role="tab"
                                    aria-controls="new-{{ $productcategorie->id }}-tab"
                                    aria-selected="false">{{ $productcategorie->category_name }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div><!-- End .heading-right -->
            </div><!-- End .heading -->

            <div class="tab-content tab-content-carousel just-action-icons-sm">


                <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel"
                    aria-labelledby="new-all-link">
                    <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                      "nav": true, 
                      "dots": true,
                      "margin": 20,
                      "loop": false,
                      "responsive": {
                          "0": {
                              "items":2
                          },
                          "480": {
                              "items":2
                          },
                          "768": {
                              "items":3
                          },
                          "992": {
                              "items":4
                          },
                          "1200": {
                              "items":5
                          }
                      }
                  }'>

                        @foreach ($products as $product)
                            @php
                                $amount = $product->selling_price - $product->discount_price;
                                $discount = ($amount / $product->selling_price) * 100;
                            @endphp



                            <div class="product product-2">
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


                                    <a href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                        <img src="{{ asset($product->product_thambnail_photo) }}" alt="Product image"
                                            class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"
                                            title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add
                                                to cart</span></a>
                                        <a href="popup/quickView.html" class="btn-product btn-quickview"
                                            title="Quick view"><span>quick view</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">



                                        <a
                                            href="{{ url('product/category/' . $product['category']['id'] . '/' . $product['category']['category_slug']) }}">
                                            {{ $product['category']['category_name'] }}
                                        </a>


                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a
                                            href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                            {{ $product->product_name }}
                                        </a>
                                    </h3><!-- End .product-title -->
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
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;"></div>
                                            <!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        @endforeach

                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->



                @foreach ($productcategories as $productcategorie)
                    <div class="tab-pane p-0 fade" id="new-{{ $productcategorie->id }}-tab" role="tabpanel"
                        aria-labelledby="new-{{ $productcategorie->id }}-link">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                            data-owl-options='{
                      "nav": true, 
                      "dots": true,
                      "margin": 20,
                      "loop": false,
                      "responsive": {
                          "0": {
                              "items":2
                          },
                          "480": {
                              "items":2
                          },
                          "768": {
                              "items":3
                          },
                          "992": {
                              "items":4
                          },
                          "1200": {
                              "items":5
                          }
                      }
                  }'>

                            @php
                                $catwiseProduct = App\Models\Product::where('category_id', $productcategorie->id)
                                    ->orderBy('id', 'DESC')
                                    ->get();
                            @endphp

                            @forelse ($catwiseProduct as $product)
                                @php
                                    $amount = $product->selling_price - $product->discount_price;
                                    $discount = ($amount / $product->selling_price) * 100;
                                @endphp
                                <div class="product product-2">
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
                                            <img src="{{ asset($product->product_thambnail_photo) }}" alt="Product image"
                                                class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                title="Add to wishlist"></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add
                                                    to
                                                    cart</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                title="Quick view"><span>quick view</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a
                                                href="{{ url('product/category/' . $productcategorie->id . '/' . $productcategorie->category_slug) }}">{{ $product['category']['category_name'] }}</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a
                                                href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                                                {{ $product->product_name }}</a>
                                        </h3><!-- End .product-title -->
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
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            @empty
                            @endforelse




                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                @endforeach



            </div><!-- End .tab-content -->
        </div><!-- End .container -->

        <div class="mb-6"></div><!-- End .mb-6 -->



        <div class="container">
            <div class="cta cta-border mb-5"
                style="background-image: url({{ asset('frontend/images/demos/demo-4/bg-1.jpg') }});">
                <img src="{{ asset('frontend/images/demos/demo-4/camera.png') }}" alt="camera" class="cta-img">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="cta-content">
                            <div class="cta-text text-right text-white">
                                <p>Shop Today’s Deals <br><strong>Awesome Made Easy. HERO7 Black</strong></p>
                            </div><!-- End .cta-text -->
                            <a href="#" class="btn btn-primary btn-round"><span>Shop Now -
                                    $429.99</span><i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .cta-content -->
                    </div><!-- End .col-md-12 -->
                </div><!-- End .row -->
            </div><!-- End .cta -->
        </div><!-- End .container -->

        <div class="container">
            <div class="heading text-center mb-3">
                <h2 class="title">Deals & Outlet</h2><!-- End .title -->
                <p class="title-desc">Today’s deal and more</p><!-- End .title-desc -->
            </div><!-- End .heading -->

            <div class="row">
                <div class="col-lg-6 deal-col">
                    <div class="deal"
                        style="background-image: url({{ asset('frontend/images/demos/demo-4/deal/bg-1.jpg') }});">
                        <div class="deal-top">
                            <h2>Deal of the Day.</h2>
                            <h4>Limited quantities. </h4>
                        </div><!-- End .deal-top -->

                        <div class="deal-content">
                            <h3 class="product-title"><a href="product.html">Home Smart Speaker with Google
                                    Assistant</a></h3><!-- End .product-title -->

                            <div class="product-price">
                                <span class="new-price">$129.00</span>
                                <span class="old-price">Was $150.99</span>
                            </div><!-- End .product-price -->

                            <a href="product.html" class="btn btn-link"><span>Shop Now</span><i
                                    class="icon-long-arrow-right"></i></a>
                        </div><!-- End .deal-content -->

                        <div class="deal-bottom">
                            <div class="deal-countdown daily-deal-countdown" data-until="+10h"></div>
                            <!-- End .deal-countdown -->
                        </div><!-- End .deal-bottom -->
                    </div><!-- End .deal -->
                </div><!-- End .col-lg-6 -->

                <div class="col-lg-6 deal-col">
                    <div class="deal"
                        style="background-image: url({{ asset('frontend/images/demos/demo-4/deal/bg-2.jpg') }});">
                        <div class="deal-top">
                            <h2>Your Exclusive Offers.</h2>
                            <h4>Sign in to see amazing deals.</h4>
                        </div><!-- End .deal-top -->

                        <div class="deal-content">
                            <h3 class="product-title"><a href="product.html">Certified Wireless Charging Pad for
                                    iPhone / Android</a></h3><!-- End .product-title -->

                            <div class="product-price">
                                <span class="new-price">$29.99</span>
                            </div><!-- End .product-price -->

                            <a href="login.html" class="btn btn-link"><span>Sign In and Save money</span><i
                                    class="icon-long-arrow-right"></i></a>
                        </div><!-- End .deal-content -->

                        <div class="deal-bottom">
                            <div class="deal-countdown offer-countdown" data-until="+11d"></div>
                            <!-- End .deal-countdown -->
                        </div><!-- End .deal-bottom -->
                    </div><!-- End .deal -->
                </div><!-- End .col-lg-6 -->
            </div><!-- End .row -->

            <div class="more-container text-center mt-1 mb-5">
                <a href="#" class="btn btn-outline-dark-2 btn-round btn-more"><span>Shop more Outlet
                        deals</span><i class="icon-long-arrow-right"></i></a>
            </div><!-- End .more-container -->
        </div><!-- End .container -->

        <div class="container">
            <hr class="mb-0">
            <div class="owl-carousel mt-5 mb-5 owl-simple" data-toggle="owl"
                data-owl-options='{
              "nav": false, 
              "dots": false,
              "margin": 30,
              "loop": false,
              "responsive": {
                  "0": {
                      "items":2
                  },
                  "420": {
                      "items":3
                  },
                  "600": {
                      "items":4
                  },
                  "900": {
                      "items":5
                  },
                  "1024": {
                      "items":6
                  }
              }
          }'>
                <a href="#" class="brand">
                    <img src="{{ asset('frontend/images/brands/1.png') }}" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="{{ asset('frontend/images/brands/2.png') }}" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="{{ asset('frontend/images/brands/3.png') }}" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="{{ asset('frontend/images/brands/4.png') }}" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="{{ asset('frontend/images/brands/5.png') }}" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="{{ asset('frontend/images/brands/6.png') }}" alt="Brand Name">
                </a>
            </div><!-- End .owl-carousel -->
        </div><!-- End .container -->

        <div class="bg-light pt-5 pb-6">
            <div class="container trending-products">
                <div class="heading heading-flex mb-3">
                    <div class="heading-left">
                        <h2 class="title">Trending Products</h2><!-- End .title -->
                    </div><!-- End .heading-left -->
                </div><!-- End .heading -->

                <div class="row">
                    <div class="col-xl-5col d-none d-xl-block">
                        <div class="banner">
                            <a href="#">
                                <img src="{{ asset('frontend/images/demos/demo-4/banners/banner-4.jpg') }}"
                                    alt="banner">
                            </a>
                        </div><!-- End .banner -->
                    </div><!-- End .col-xl-5col -->

                    <div class="col-xl-4-5col">
                        <div class="tab-content tab-content-carousel just-action-icons-sm">
                            <div class="tab-pane p-0 fade show active" id="trending-top-tab" role="tabpanel"
                                aria-labelledby="trending-top-link">
                                <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow"
                                    data-toggle="owl"
                                    data-owl-options='{
                                  "nav": true, 
                                  "dots": false,
                                  "margin": 20,
                                  "loop": false,
                                  "responsive": {
                                      "0": {
                                          "items":2
                                      },
                                      "480": {
                                          "items":2
                                      },
                                      "768": {
                                          "items":3
                                      },
                                      "992": {
                                          "items":4
                                      }
                                  }
                              }'>


                                    @foreach ($trendproducts as $trendproduct)
                                        @php
                                            $amount = $trendproduct->selling_price - $trendproduct->discount_price;
                                            $discount = ($amount / $trendproduct->selling_price) * 100;
                                        @endphp
                                        <div class="product product-2">
                                            <figure class="product-media">

                                                @if ($trendproduct->new_product == 1)
                                                    <span class="product-label label-circle label-sale"> Trend</span>
                                                @else
                                                @endif

                                                @if ($trendproduct->discount_price == null)
                                                @else
                                                    <span class="product-label label-circle label-new">
                                                        {{ round($discount) }}%
                                                    </span>
                                                @endif

                                                <a
                                                    href="{{ url('product/details/' . $trendproduct->id . '/' . $trendproduct->product_slug) }}">
                                                    <img src="{{ asset($trendproduct->product_thambnail_photo) }}"
                                                        alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist"
                                                        title="Add to wishlist"></a>
                                                </div><!-- End .product-action -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"
                                                        title="Add to cart"><span>add to cart</span></a>
                                                    <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                        title="Quick view"><span>quick view</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a
                                                        href="{{ url('product/category/' . $trendproduct['category']['id'] . '/' . $trendproduct['category']['category_slug']) }}">{{ $trendproduct['category']['category_name'] }}</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a
                                                        href="{{ url('product/details/' . $trendproduct->id . '/' . $trendproduct->product_slug) }}">
                                                        {{ $trendproduct->product_name }}
                                                    </a></h3><!-- End .product-title -->

                                                @if ($trendproduct->discount_price == null)
                                                    <div class="product-price">
                                                        {{ $trendproduct->selling_price }} TL
                                                    </div><!-- End .product-price -->
                                                @else
                                                    <div class="product-price">
                                                        <del class="text-danger pr-2"> {{ $trendproduct->selling_price }}
                                                            TL
                                                        </del>
                                                        / {{ $trendproduct->discount_price }} TL

                                                    </div><!-- End .product-price -->
                                                @endif


                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 80%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 4 Reviews )</span>
                                                </div><!-- End .rating-container -->


                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    @endforeach




                                </div><!-- End .owl-carousel -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane p-0 fade" id="trending-best-tab" role="tabpanel"
                                aria-labelledby="trending-best-link">
                                <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow"
                                    data-toggle="owl"
                                    data-owl-options='{
                                  "nav": true, 
                                  "dots": false,
                                  "margin": 20,
                                  "loop": false,
                                  "responsive": {
                                      "0": {
                                          "items":2
                                      },
                                      "480": {
                                          "items":2
                                      },
                                      "768": {
                                          "items":3
                                      },
                                      "992": {
                                          "items":4
                                      }
                                  }
                              }'>
                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <span class="product-label label-circle label-new">New</span>
                                            <a href="product.html">
                                                <img src="{{ asset('frontend/images/demos/demo-4/products/product-3.jpg') }}"
                                                    alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist"
                                                    title="Add to wishlist"></a>
                                            </div><!-- End .product-action -->

                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart"
                                                    title="Add to cart"><span>add to cart</span></a>
                                                <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                    title="Quick view"><span>quick view</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">Tablets</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.html">Apple - 11 Inch
                                                    iPad Pro with Wi-Fi 256GB </a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                $899.99
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 80%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 4 Reviews )</span>
                                            </div><!-- End .rating-container -->

                                            <div class="product-nav product-nav-dots">
                                                <a href="#" style="background: #edd2c8;"><span
                                                        class="sr-only">Color name</span></a>
                                                <a href="#" style="background: #eaeaec;"><span
                                                        class="sr-only">Color name</span></a>
                                                <a href="#" class="active" style="background: #333333;"><span
                                                        class="sr-only">Color
                                                        name</span></a>
                                            </div><!-- End .product-nav -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->

                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="{{ asset('frontend/images/demos/demo-4/products/product-2.jpg') }}"
                                                    alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist"
                                                    title="Add to wishlist"></a>
                                            </div><!-- End .product-action -->

                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart"
                                                    title="Add to cart"><span>add to cart</span></a>
                                                <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                    title="Quick view"><span>quick view</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">Audio</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.html">Bose - SoundLink
                                                    Bluetooth Speaker</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                $79.99
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 60%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 6 Reviews )</span>
                                            </div><!-- End .rating-container -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->

                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <span class="product-label label-circle label-top">Top</span>
                                            <span class="product-label label-circle label-sale">Sale</span>
                                            <a href="product.html">
                                                <img src="{{ asset('frontend/images/demos/demo-4/products/product-4.jpg') }}"
                                                    alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist"
                                                    title="Add to wishlist"></a>
                                            </div><!-- End .product-action -->

                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart"
                                                    title="Add to cart"><span>add to cart</span></a>
                                                <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                    title="Quick view"><span>quick view</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">Cell Phone</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.html">Google - Pixel 3 XL
                                                    128GB</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                <span class="new-price">$35.41</span>
                                                <span class="old-price">Was $41.67</span>
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 100%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 10 Reviews )</span>
                                            </div><!-- End .rating-container -->

                                            <div class="product-nav product-nav-dots">
                                                <a href="#" class="active" style="background: #edd2c8;"><span
                                                        class="sr-only">Color
                                                        name</span></a>
                                                <a href="#" style="background: #eaeaec;"><span
                                                        class="sr-only">Color name</span></a>
                                                <a href="#" style="background: #333333;"><span
                                                        class="sr-only">Color name</span></a>
                                            </div><!-- End .product-nav -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->

                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <span class="product-label label-circle label-top">Top</span>
                                            <a href="product.html">
                                                <img src="{{ asset('frontend/images/demos/demo-4/products/product-5.jpg') }}"
                                                    alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist"
                                                    title="Add to wishlist"></a>
                                            </div><!-- End .product-action -->

                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart"
                                                    title="Add to cart"><span>add to cart</span></a>
                                                <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                    title="Quick view"><span>quick view</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">TV & Home Theater</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.html">Samsung - 55" Class
                                                    LED 2160p Smart</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                $899.99
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 60%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 5 Reviews )</span>
                                            </div><!-- End .rating-container -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->

                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <span class="product-label label-circle label-top">Top</span>
                                            <a href="product.html">
                                                <img src="{{ asset('frontend/images/demos/demo-4/products/product-1.jpg') }}"
                                                    alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist"
                                                    title="Add to wishlist"></a>
                                            </div><!-- End .product-action -->

                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart"
                                                    title="Add to cart"><span>add to cart</span></a>
                                                <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                    title="Quick view"><span>quick view</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">Laptops</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.html">MacBook Pro 13"
                                                    Display, i5</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                $1,199.99
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 100%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 4 Reviews )</span>
                                            </div><!-- End .rating-container -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .owl-carousel -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane p-0 fade" id="trending-sale-tab" role="tabpanel"
                                aria-labelledby="trending-sale-link">
                                <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow"
                                    data-toggle="owl"
                                    data-owl-options='{
                                  "nav": true, 
                                  "dots": false,
                                  "margin": 20,
                                  "loop": false,
                                  "responsive": {
                                      "0": {
                                          "items":2
                                      },
                                      "480": {
                                          "items":2
                                      },
                                      "768": {
                                          "items":3
                                      },
                                      "992": {
                                          "items":4
                                      }
                                  }
                              }'>
                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <span class="product-label label-circle label-new">New</span>
                                            <a href="product.html">
                                                <img src="{{ asset('frontend/images/demos/demo-4/products/product-8.jpg') }}"
                                                    alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist"
                                                    title="Add to wishlist"></a>
                                            </div><!-- End .product-action -->

                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart"
                                                    title="Add to cart"><span>add to cart</span></a>
                                                <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                    title="Quick view"><span>quick view</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">Smartwatches</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.html">Apple Watch Series
                                                    4 Gold Aluminum Case</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                $499.99
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 80%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 4 Reviews )</span>
                                            </div><!-- End .rating-container -->

                                            <div class="product-nav product-nav-dots">
                                                <a href="#" style="background: #edd2c8;"><span
                                                        class="sr-only">Color name</span></a>
                                                <a href="#" style="background: #eaeaec;"><span
                                                        class="sr-only">Color name</span></a>
                                                <a href="#" class="active" style="background: #333333;"><span
                                                        class="sr-only">Color
                                                        name</span></a>
                                            </div><!-- End .product-nav -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->

                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <span class="product-label label-circle label-top">Top</span>
                                            <a href="product.html">
                                                <img src="{{ asset('frontend/images/demos/demo-4/products/product-6.jpg') }}"
                                                    alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist"
                                                    title="Add to wishlist"></a>
                                            </div><!-- End .product-action -->

                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart"
                                                    title="Add to cart"><span>add to cart</span></a>
                                                <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                    title="Quick view"><span>quick view</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">Headphones</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.html">Bose - SoundSport
                                                    wireless headphones</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                $199.99
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 100%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 4 Reviews )</span>
                                            </div><!-- End .rating-container -->

                                            <div class="product-nav product-nav-dots">
                                                <a href="#" style="background: #69b4ff;"><span
                                                        class="sr-only">Color name</span></a>
                                                <a href="#" style="background: #ff887f;"><span
                                                        class="sr-only">Color name</span></a>
                                                <a href="#" class="active" style="background: #333333;"><span
                                                        class="sr-only">Color
                                                        name</span></a>
                                            </div><!-- End .product-nav -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->

                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="{{ asset('frontend/images/demos/demo-4/products/product-7.jpg') }}"
                                                    alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist"
                                                    title="Add to wishlist"></a>
                                            </div><!-- End .product-action -->

                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart"
                                                    title="Add to cart"><span>add to cart</span></a>
                                                <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                    title="Quick view"><span>quick view</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">Video Games</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.html">Microsoft -
                                                    Refurbish Xbox One S 500GB</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                $279.99
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 60%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 6 Reviews )</span>
                                            </div><!-- End .rating-container -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->

                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <span class="product-label label-circle label-new">New</span>
                                            <a href="product.html">
                                                <img src="{{ asset('frontend/images/demos/demo-4/products/product-3.jpg') }}"
                                                    alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist"
                                                    title="Add to wishlist"></a>
                                            </div><!-- End .product-action -->

                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart"
                                                    title="Add to cart"><span>add to cart</span></a>
                                                <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                    title="Quick view"><span>quick view</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">Tablets</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.html">Apple - 11 Inch
                                                    iPad Pro with Wi-Fi 256GB </a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                $899.99
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 80%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 4 Reviews )</span>
                                            </div><!-- End .rating-container -->

                                            <div class="product-nav product-nav-dots">
                                                <a href="#" style="background: #edd2c8;"><span
                                                        class="sr-only">Color name</span></a>
                                                <a href="#" style="background: #eaeaec;"><span
                                                        class="sr-only">Color name</span></a>
                                                <a href="#" class="active" style="background: #333333;"><span
                                                        class="sr-only">Color
                                                        name</span></a>
                                            </div><!-- End .product-nav -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .owl-carousel -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .col-xl-4-5col -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .bg-light pt-5 pb-6 -->

        <div class="mb-5"></div><!-- End .mb-5 -->

        <div class="container for-you">
            <div class="heading heading-flex mb-3">
                <div class="heading-left">
                    <h2 class="title">Recommendation For You</h2><!-- End .title -->
                </div><!-- End .heading-left -->

                <div class="heading-right">
                    <a href="{{ route('products') }}" class="title-link">View All Recommendadion <i
                            class="icon-long-arrow-right"></i></a>
                </div><!-- End .heading-right -->
            </div><!-- End .heading -->

            <div class="products">
                <div class="row justify-content-center">

                    @foreach ($adviceproducts as $adviceproduct)
                        @php
                            $amount = $adviceproduct->selling_price - $adviceproduct->discount_price;
                            $discount = ($amount / $adviceproduct->selling_price) * 100;
                        @endphp
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="product product-2">
                                <figure class="product-media">
                                    @if ($product->advice_product == 1)
                                        <span class="product-label label-circle label-top">Tavsiye</span>
                                    @else
                                    @endif



                                    @if ($adviceproduct->discount_price == null)
                                    @else
                                        <span class="product-label label-circle label-new">
                                            {{ round($discount) }}%
                                        </span>
                                    @endif
                                    <a
                                        href="{{ url('product/details/' . $adviceproduct->id . '/' . $adviceproduct->product_slug) }}">
                                        <img src="{{ asset($adviceproduct->product_thambnail_photo) }}"
                                            alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"
                                            title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to
                                                cart</span></a>
                                        <a href="popup/quickView.html" class="btn-product btn-quickview"
                                            title="Quick view"><span>quick view</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a
                                            href="{{ url('product/category/' . $adviceproduct['category']['id'] . '/' . $adviceproduct['category']['category_slug']) }}">{{ $adviceproduct['category']['category_name'] }}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a
                                            href="{{ url('product/details/' . $adviceproduct->id . '/' . $adviceproduct->product_slug) }}">
                                            {{ $product->product_name }}
                                        </a></h3><!-- End .product-title -->
                                    @if ($adviceproduct->discount_price == null)
                                        <div class="product-price">
                                            {{ $adviceproduct->selling_price }} TL
                                        </div><!-- End .product-price -->
                                    @else
                                        <div class="product-price">
                                            <del class="text-danger pr-2"> {{ $adviceproduct->selling_price }} TL
                                            </del>
                                            / {{ $adviceproduct->discount_price }} TL

                                        </div><!-- End .product-price -->
                                    @endif
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 60%;"></div>
                                            <!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 2 Reviews )</span>
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                    @endforeach

                </div><!-- End .row -->
            </div><!-- End .products -->
        </div><!-- End .container -->

        <div class="mb-4"></div><!-- End .mb-4 -->

        <div class="container">
            <hr class="mb-0">
        </div><!-- End .container -->

        <div class="icon-boxes-container bg-transparent">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="icon-box icon-box-side">
                            <span class="icon-box-icon text-dark">
                                <i class="icon-rocket"></i>
                            </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
                                <p>Orders $50 or more</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="icon-box icon-box-side">
                            <span class="icon-box-icon text-dark">
                                <i class="icon-rotate-left"></i>
                            </span>

                            <div class="icon-box-content">
                                <h3 class="icon-box-title">Free Returns</h3><!-- End .icon-box-title -->
                                <p>Within 30 days</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="icon-box icon-box-side">
                            <span class="icon-box-icon text-dark">
                                <i class="icon-info-circle"></i>
                            </span>

                            <div class="icon-box-content">
                                <h3 class="icon-box-title">Get 20% Off 1 Item</h3><!-- End .icon-box-title -->
                                <p>when you sign up</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->

                    <div class="col-sm-6 col-lg-3">
                        <div class="icon-box icon-box-side">
                            <span class="icon-box-icon text-dark">
                                <i class="icon-life-ring"></i>
                            </span>

                            <div class="icon-box-content">
                                <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                                <p>24/7 amazing services</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-sm-6 col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .icon-boxes-container -->
    </main>
@endsection
