@extends('frontend.main_master')
@section('content')
    <style>
        img {
            width: 100%;
            display: block;
        }

        .img-display {
            overflow: hidden;
        }

        .img-showcase {
            display: flex;
            width: 100%;
            transition: all 0.5s ease;
        }

        .img-showcase img {
            min-width: 100%;
        }

        .img-select {
            display: flex;
        }

        .img-item {
            margin: 0.3rem;
        }

        .img-item:nth-child(1),
        .img-item:nth-child(2),
        .img-item:nth-child(3) {
            margin-right: 0;
        }

        .img-item:hover {
            opacity: 0.8;
        }


        @media screen and (min-width: 992px) {

            .product-imgs {
                display: flex;
                flex-direction: column;
                justify-content: center;
            }


        }
    </style>

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6425ee6938311ed0"></script>




    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Anasayfa</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products') }}">Ürünler</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $products->product_name }}</li>
                </ol>

               
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="product-details-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-wrapper">
                                <div class="card">
                                    <!-- card left -->
                                    <div class="product-imgs">
                                        <div class="img-display">
                                            <div class="img-showcase">

                                                @foreach ($productImages as $productImage)
                                                    <img src="{{ asset($productImage->photo) }}" alt="shoe image">
                                                @endforeach


                                            </div>
                                        </div>
                                        <div class="img-select">

                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($productImages as $productImage)
                                                <div class="img-item">
                                                    <a href="#" data-id="{{ $i++ }}">
                                                        <img src="{{ asset($productImage->photo) }}" alt="shoe image">
                                                    </a>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End .col-md-6 -->

                        <div class="col-md-6">
                            <div class="product-details">
                                <h1 class="product-title" id="pname">{{ $products->product_name }}</h1>
                                <!-- End .product-title -->






                                @php
                                    
                                    $reviews = App\Models\Review::where('product_id', $products->id)
                                        // ->where('status', 1)
                                        ->latest()
                                        ->limit(5)
                                        ->get();
                                    
                                    $avarage = App\Models\Review::where('product_id', $products->id)
                                        // ->where('status', 1)
                                        ->avg('rating');
                                @endphp

                                <div class="ratings-container">

                                    @if ($avarage == 0)
                                        Henüz Değerlendirme Yok
                                    @elseif($avarage == 1 || $avarage < 2)
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                    @elseif($avarage == 2 || $avarage < 3)
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 40%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                    @elseif($avarage == 3 || $avarage < 4)
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                    @elseif($avarage == 4 || $avarage < 5)
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                    @elseif($avarage == 5 || $avarage < 5)
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                    @endif


                                    <a class="ratings-text" href="#product-review-link" id="review-link">(
                                        {{ count($reviews) }} Yorum )</a>
                                </div><!-- End .rating-container -->

                                @php
                                    $amount = $products->selling_price - $products->discount_price;
                                    $discount = ($amount / $products->selling_price) * 100;
                                @endphp




                                @if ($products->discount_price == null)
                                    <div class="product-price">
                                        {{ $products->selling_price }} TL
                                    </div><!-- End .product-price -->
                                @else
                                    <del> {{ $products->selling_price }} TL </del>
                                    <div class="product-price">
                                        {{ $products->discount_price }} TL /
                                        @if ($products->discount_price == null)
                                        @else
                                            {{ round($discount) }}%
                                        @endif
                                    </div><!-- End .product-price -->
                                @endif







                                <div class="details-filter-row details-row-size">
                                    <label for="qty">Adet:</label>
                                    <div class="product-details-quantity">
                                        <input type="number" class="form-control" id="qty" value="1"
                                            min="1" required>
                                    </div><!-- End .product-details-quantity -->
                                </div><!-- End .details-filter-row -->

                                <input type="hidden" id="product_id" value="{{ $products->id }}" min="1">


                                <button type="submit" onclick="addToCart()" class="btn btn-primary btn-xs">Sepete
                                    Ekle</button>

                                <hr>

                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <div class="addthis_inline_share_toolbox_cg1s"></div>

                                <hr>



                                <div class="product-details-action">




                                    <div class="details-action-wrapper">
                                        <button type="button" id="{{ $products->id }}"
                                            onclick="addToWishList(this.id)"
                                            class="btn-product-icon btn-wishlist"
                                            title="Add to wishlist"></button>
                                    </div><!-- End .details-action-wrapper -->
                                </div><!-- End .product-details-action -->

                                {{-- <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>Category:</span>
                                        <a href="#">Women</a>,
                                        <a href="#">Dresses</a>,
                                        <a href="#">Yellow</a>
                                    </div><!-- End .product-cat -->
                                </div><!-- End .product-details-footer --> --}}


                            </div><!-- End .product-details -->
                        </div><!-- End .col-md-6 -->
                    </div><!-- End .row -->
                </div><!-- End .product-details-top -->

                <div class="product-details-tab">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                                role="tab" aria-controls="product-desc-tab" aria-selected="true">Açıklama</a>
                        </li>

                        @php
                            $reviews = App\Models\Review::where('product_id', $products->id)
                                // ->where('status', 1)
                                ->latest()
                                ->limit(5)
                                ->get();
                            
                        @endphp

                        <li class="nav-item">
                            <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab"
                                role="tab" aria-controls="product-review-tab" aria-selected="false">Yorumlar
                                ({{ count($reviews) }})</a>
                        </li>



                        <li class="nav-item">
                            <a class="nav-link" id="product-review-link" data-toggle="tab"
                                href="#product-write-review-tab" role="tab" aria-controls="product-write-review-tab"
                                aria-selected="false">Yorum Yaz </a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                            aria-labelledby="product-desc-link">
                            <div class="product-desc-content">
                                {!! $products->product_description !!}
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->


                        <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                            aria-labelledby="product-review-link">
                            <div class="reviews">
                                <h3>Reviews ({{ count($reviews) }})</h3>


                                <style>
                                    .checked {
                                        color: orange;
                                    }
                                </style>



                                @foreach ($reviews as $review)
                                    <div class="review">
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <h4><a href="#">{{ $review->user->name }}</a></h4>
                                                <div class="ratings-container">
                                                    @if ($review->rating == null)
                                                        Değerlendirme Yok
                                                    @elseif($review->rating == 1)
                                                        <div class="ratings">
                                                            <div class="ratings-val" style="width: 20%;"></div>
                                                            <!-- End .ratings-val -->
                                                        </div><!-- End .ratings -->
                                                    @elseif($review->rating == 2)
                                                        <div class="ratings">
                                                            <div class="ratings-val" style="width: 40%;"></div>
                                                            <!-- End .ratings-val -->
                                                        </div><!-- End .ratings -->
                                                    @elseif($review->rating == 3)
                                                        <div class="ratings">
                                                            <div class="ratings-val" style="width: 60%;"></div>
                                                            <!-- End .ratings-val -->
                                                        </div><!-- End .ratings -->
                                                    @elseif($review->rating == 4)
                                                        <div class="ratings">
                                                            <div class="ratings-val" style="width: 80%;"></div>
                                                            <!-- End .ratings-val -->
                                                        </div><!-- End .ratings -->
                                                    @elseif($review->rating == 5)
                                                        <div class="ratings">
                                                            <div class="ratings-val" style="width: 100%;"></div>
                                                            <!-- End .ratings-val -->
                                                        </div><!-- End .ratings -->
                                                    @endif

                                                </div><!-- End .rating-container -->
                                                <span
                                                    class="review-date">{{ Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</span>
                                            </div><!-- End .col -->
                                            <div class="col">
                                                <h4>{{ $review->summary }}</h4>

                                                <div class="review-content">
                                                    <p>{{ $review->comment }}</p>
                                                </div><!-- End .review-content -->

                                                {{-- <div class="review-action">
                                                    <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                                    <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                                </div><!-- End .review-action --> --}}
                                            </div><!-- End .col-auto -->
                                        </div><!-- End .row -->
                                    </div><!-- End .review -->
                                @endforeach

                            </div><!-- End .reviews -->
                        </div><!-- .End .tab-pane -->


                        <div class="tab-pane fade" id="product-write-review-tab" role="tabpanel"
                            aria-labelledby="product-review-link">
                            <div class="reviews">

                                @guest
                                    <b>Yorum Yazmak İçin Lütfen Giriş Yapın <a href="{{ route('login') }}">Giriş Yap</a></b>
                                @else
                                    <div class="col-lg-12">
                                        <h2 class="title mb-1">Yorum Yazın</h2><!-- End .title mb-2 -->

                                        <form action="{{ route('review.store') }}" method="POST" class="contact-form mb-3">
                                            @csrf

                                            <input type="hidden" name="product_id" value="{{ $products->id }}">

                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="cell-label">&nbsp;</th>
                                                        <th>1 star</th>
                                                        <th>2 stars</th>
                                                        <th>3 stars</th>
                                                        <th>4 stars</th>
                                                        <th>5 stars</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="cell-label">Değerlendir</td>
                                                        <td><input type="radio" name="quality" class="radio"
                                                                value="1"></td>
                                                        <td><input type="radio" name="quality" class="radio"
                                                                value="2"></td>
                                                        <td><input type="radio" name="quality" class="radio"
                                                                value="3"></td>
                                                        <td><input type="radio" name="quality" class="radio"
                                                                value="4"></td>
                                                        <td><input type="radio" name="quality" class="radio"
                                                                value="5"></td>
                                                    </tr>

                                                </tbody>
                                            </table>

                                            <div class="row">

                                                <div class="col-sm-12">
                                                    <label for="cname" class="sr-only">Özet</label>
                                                    <input type="text" class="form-control" id="cname"
                                                        placeholder="Özet *" name="summary" required>
                                                </div><!-- End .col-sm-12 -->

                                            </div><!-- End .row -->

                                            <label for="cmessage" class="sr-only">Yorumunuz</label>
                                            <textarea class="form-control" cols="30" rows="4" id="cmessage" name="comment" required
                                                placeholder="Yorumunuz *"></textarea>

                                            <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                                <span>Yorum Yap</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                        </form><!-- End .contact-form -->
                                    </div><!-- End .col-lg-6 -->
                                @endguest

                            </div><!-- End .reviews -->
                        </div><!-- .End .tab-pane -->


                    </div><!-- End .tab-content -->
                </div><!-- End .product-details-tab -->

                {{-- <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                  "nav": false, 
                  "dots": true,
                  "margin": 20,
                  "loop": false,
                  "responsive": {
                      "0": {
                          "items":1
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
                          "items":4,
                          "nav": true,
                          "dots": false
                      }
                  }
              }'>
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            <span class="product-label label-new">New</span>
                            <a href="product.html">
                                <img src="assets/images/products/product-4.jpg" alt="Product image"
                                    class="product-image">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                        wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                    title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare"
                                    title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Women</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Brown paperbag waist <br>pencil skirt</a>
                            </h3><!-- End .product-title -->
                            <div class="product-price">
                                $60.00
                            </div><!-- End .product-price -->
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 2 Reviews )</span>
                            </div><!-- End .rating-container -->

                            <div class="product-nav product-nav-thumbs">
                                <a href="#" class="active">
                                    <img src="assets/images/products/product-4-thumb.jpg" alt="product desc">
                                </a>
                                <a href="#">
                                    <img src="assets/images/products/product-4-2-thumb.jpg" alt="product desc">
                                </a>

                                <a href="#">
                                    <img src="assets/images/products/product-4-3-thumb.jpg" alt="product desc">
                                </a>
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
               

                </div><!-- End .owl-carousel --> --}}

                
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->





    <script>
        const imgs = document.querySelectorAll('.img-select a');
        const imgBtns = [...imgs];
        let imgId = 1;

        imgBtns.forEach((imgItem) => {
            imgItem.addEventListener('click', (event) => {
                event.preventDefault();
                imgId = imgItem.dataset.id;
                slideImage();
            });
        });

        function slideImage() {
            const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

            document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
        }

        window.addEventListener('resize', slideImage);
    </script>
@endsection
