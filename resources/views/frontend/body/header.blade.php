<header class="header header-intro-clearance header-4">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="tel:#"><i class="icon-phone"></i>Ara: {{ $settings->phone }}</a>
            </div><!-- End .header-left -->

            <div class="header-right">

                <ul class="top-menu mt-1 mb-1">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            {{-- <li>
                                <div class="header-dropdown">
                                    <a href="#">USD</a>
                                    <div class="header-menu">
                                        <ul>
                                            <li><a href="#">Eur</a></li>
                                            <li><a href="#">Usd</a></li>
                                        </ul>
                                    </div><!-- End .header-menu -->
                                </div>
                            </li>
                            <li>
                                <div class="header-dropdown">
                                    <a href="#">English</a>
                                    <div class="header-menu">
                                        <ul>
                                            <li><a href="#">English</a></li>
                                            <li><a href="#">French</a></li>
                                            <li><a href="#">Spanish</a></li>
                                        </ul>
                                    </div><!-- End .header-menu -->
                                </div>
                            </li> --}}
                            @auth
                                <li><a href="{{ route('user.profile') }}">Profil</a></li>
                                <li><a href="{{ route('change.password') }}">Şifre Değiştir</a></li>
                                <li><a href="{{ route('my.orders') }}">Siparişlerim</a></li>
                                <li><a href="{{ route('return.order.list') }}">İade Ettiklerim</a></li>
                                <li><a href="{{ route('cancel.orders') }}">İptal Ettiklerim</a></li>
                                <li><a href="" type="button" data-toggle="modal" data-target="#ordertraking">Sipariş
                                        Takip </a></li>
                                <li><a href="{{ route('user.logout') }}">Çıkış Yap</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Giriş Yap</a> / <a href="{{ route('register') }}">Kayıt
                                        Ol</a></li>
                            @endauth

                        </ul>
                    </li>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-right -->

        </div><!-- End .container -->
    </div><!-- End .header-top -->




    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{ route('/') }}" class="logo">
                    <img src="{{ asset($settings->logo) }}" alt="Molla Logo" width="105" height="25">
                </a>
            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="{{ route('product.search') }}" method="POST">
                        @csrf
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Search</label>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                            <input type="text" onfocus="search_result_show()" onblur="search_result_hide()"
                                class="form-control" name="search" id="search" placeholder="Ürün Ara ..." required>
                        </div><!-- End .header-search-wrapper -->
                        <div id="searchProducts"></div>

                    </form>
                </div><!-- End .header-search -->
            </div>

            <div class="header-right">
                {{-- <div class="dropdown compare-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" data-display="static" title="Compare Products"
                        aria-label="Compare Products">
                        <div class="icon">
                            <i class="icon-random"></i>
                        </div>
                        <p>Compare</p>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="compare-products">
                            <li class="compare-product">
                                <a href="#" class="btn-remove" title="Remove Product"><i
                                        class="icon-close"></i></a>
                                <h4 class="compare-product-title"><a href="product.html">Blue Night Dress</a></h4>
                            </li>
                            <li class="compare-product">
                                <a href="#" class="btn-remove" title="Remove Product"><i
                                        class="icon-close"></i></a>
                                <h4 class="compare-product-title"><a href="product.html">White Long Skirt</a></h4>
                            </li>
                        </ul>

                        <div class="compare-actions">
                            <a href="#" class="action-link">Clear All</a>
                            <a href="#" class="btn btn-outline-primary-2"><span>Compare</span><i
                                    class="icon-long-arrow-right"></i></a>
                        </div>
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .compare-dropdown --> --}}



                @php
                    $wishlist = App\Models\Wishlist::with([
                        'product' => function ($query) {
                            $query->where('status', 1);
                        },
                    ])
                        ->where('user_id', Auth::id())
                        ->latest()
                        ->whereHas('product', function ($query) {
                            $query->where('status', 1);
                        })
                        ->get();
                @endphp
                @auth
                    <div class="wishlist">
                        <a href="{{ route('wishlist') }}" title="Wishlist">
                            <div class="icon">
                                <i class="icon-heart-o"></i>
                                <span class="wishlist-count badge">{{ count($wishlist) }}</span>
                            </div>
                            <p>İstek Listesi</p>
                        </a>
                    </div><!-- End .compare-dropdown -->
                @else
                @endauth




                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" data-display="static">
                        <div class="icon">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count" id="cartQty"></span>
                        </div>
                        <p>Sepetim</p>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-cart-products">

                            {{-- Mini Cart Start With Ajax --}}
                            <div id="miniCart">

                            </div>
                            {{-- Mini Cart End With Ajax --}}


                        </div><!-- End .cart-product -->

                        <div class="dropdown-cart-total">
                            <span>Toplam</span>

                            <span class="cart-total-price" id="cartSubTotal"> </span> TL
                        </div><!-- End .dropdown-cart-total -->

                        <div class="dropdown-cart-action">
                            <a href="{{ route('mycart') }}" class="btn btn-primary">Sepete Git</a>
                            <a href="{{ route('checkout') }}" class="btn btn-outline-primary-2"><span>Öde</span><i
                                    class="icon-long-arrow-right"></i></a>
                        </div><!-- End .dropdown-cart-total -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .cart-dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container">


            <div class="header-left">
                <div class="dropdown category-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" data-display="static" title="Browse Categories">
                        Kategoriler <i class="icon-angle-down"></i>
                    </a>

                    @php
                        $productcategories = App\Models\ProductCategory::where('status', 1)
                            ->orderBy('desk', 'ASC')
                            ->get();
                    @endphp
                    <div class="dropdown-menu">
                        <nav class="side-nav">
                            <ul class="menu-vertical sf-arrows">
                                @foreach ($productcategories as $productcategorie)
                                    <li class="item-lead">
                                        <a
                                            href="{{ url('product/category/' . $productcategorie->id . '/' . $productcategorie->category_slug) }}">
                                            {{ $productcategorie->category_name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul><!-- End .menu-vertical -->
                        </nav><!-- End .side-nav -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .category-dropdown -->
            </div><!-- End .header-left -->

            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container active">
                            <a href="{{ route('/') }}">Anasayfa</a>
                        </li>
                        <li>
                            <a href="{{ route('products') }}">Ürünler</a>
                        </li>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-center -->


        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header>

<style>
    #searchProducts {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #ffffff;
        z-index: 999;
        border-radius: 8px;
        margin-top: 5px;
    }
</style>

{{-- <script>
    function search_result_show() {
        $("#searchProducts").slideUp();
    }

    function search_result_hide() {
        $("#searchProducts").slideDown();
    }
</script> --}}


<!-- Sipariş Takip Modal -->
<div class="modal fade" id="ordertraking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sipariş Takip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-5">
                <form action="{{ route('order.tracking') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label for="">Fatura Kodu</label>
                        <input type="text" name="code" required class="form-control"
                            placeholder="Sipariş Fatura Numarası" id="">
                    </div>
                    <button type="submit" class="btn btn-danger">Siparişi Takip Et</button>
                </form>
            </div>
        </div>
    </div>
</div>
