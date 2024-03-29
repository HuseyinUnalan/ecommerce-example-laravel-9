@php
    $settings = App\Models\SiteSetting::find(1);
    $seo = App\Models\Seo::find(1);
@endphp
<!DOCTYPE html>
<html lang="tr">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $settings->site_title }}</title>
    <meta name="keywords" content="{{ $seo->meta_keyword }}">
    <meta name="description" content="{{ $seo->meta_description }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Hüseyin Ünalan">

    {{-- Google Analytics --}}
    <script>
        {{ $seo->google_analytics }}
    </script>
    {{-- Google Analytics --}}

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset($settings->favicon) }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset($settings->favicon) }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset($settings->favicon) }}">
    <link rel="manifest" href="{{ asset('frontend/images/icons/site.html') }}">
    <link rel="mask-icon" href="{{ asset('frontend/images/icons/safari-pinned-tab.svg') }}" color="#666666">
    <link rel="shortcut icon" href="{{ asset($settings->favicon) }}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{ asset('frontend/images/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet"
        href="{{ asset('frontend/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css') }}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/jquery.countdown.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/font-awesome/css/all.min.css') }}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/skins/skin-demo-4.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/demos/demo-4.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/nouislider/nouislider.css') }}">


    <!-- Toastr Css-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body>
    <div class="page-wrapper">


        @include('frontend.body.header')
        <!-- End .header -->

        @yield('content')
        <!-- End .main -->


        @include('frontend.body.footer')
        <!-- End .footer -->

    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container mobile-menu-light">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="{{ route('product.search') }}" method="POST" class="mobile-search">
                @csrf
                <label for="mobile-search" class="sr-only">Ürün Ara</label>
                <input type="search" class="form-control" onfocus="search_result_show()" onblur="search_result_hide()"
                    name="search" id="search" placeholder="Ürün Ara..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

           

            <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab"
                        role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab"
                        role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Categories</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel"
                    aria-labelledby="mobile-menu-link">
                    <nav class="mobile-nav">
                        <ul class="mobile-menu">
                            <li class="active">
                                <a href="index.html">Home</a>

                                <ul>
                                    <li><a href="index-1.html">01 - furniture store</a></li>
                                    <li><a href="index-2.html">02 - furniture store</a></li>
                                    <li><a href="index-3.html">03 - electronic store</a></li>
                                    <li><a href="index-4.html">04 - electronic store</a></li>
                                    <li><a href="index-5.html">05 - fashion store</a></li>
                                    <li><a href="index-6.html">06 - fashion store</a></li>
                                    <li><a href="index-7.html">07 - fashion store</a></li>
                                    <li><a href="index-8.html">08 - fashion store</a></li>
                                    <li><a href="index-9.html">09 - fashion store</a></li>
                                    <li><a href="index-10.html">10 - shoes store</a></li>
                                    <li><a href="index-11.html">11 - furniture simple store</a></li>
                                    <li><a href="index-12.html">12 - fashion simple store</a></li>
                                    <li><a href="index-13.html">13 - market</a></li>
                                    <li><a href="index-14.html">14 - market fullwidth</a></li>
                                    <li><a href="index-15.html">15 - lookbook 1</a></li>
                                    <li><a href="index-16.html">16 - lookbook 2</a></li>
                                    <li><a href="index-17.html">17 - fashion store</a></li>
                                    <li><a href="index-18.html">18 - fashion store (with sidebar)</a></li>
                                    <li><a href="index-19.html">19 - games store</a></li>
                                    <li><a href="index-20.html">20 - book store</a></li>
                                    <li><a href="index-21.html">21 - sport store</a></li>
                                    <li><a href="index-22.html">22 - tools store</a></li>
                                    <li><a href="index-23.html">23 - fashion left navigation store</a></li>
                                    <li><a href="index-24.html">24 - extreme sport store</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="category.html">Shop</a>
                                <ul>
                                    <li><a href="category-list.html">Shop List</a></li>
                                    <li><a href="category-2cols.html">Shop Grid 2 Columns</a></li>
                                    <li><a href="category.html">Shop Grid 3 Columns</a></li>
                                    <li><a href="category-4cols.html">Shop Grid 4 Columns</a></li>
                                    <li><a href="category-boxed.html"><span>Shop Boxed No Sidebar<span
                                                    class="tip tip-hot">Hot</span></span></a></li>
                                    <li><a href="category-fullwidth.html">Shop Fullwidth No Sidebar</a></li>
                                    <li><a href="product-category-boxed.html">Product Category Boxed</a></li>
                                    <li><a href="product-category-fullwidth.html"><span>Product Category
                                                Fullwidth<span class="tip tip-new">New</span></span></a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="#">Lookbook</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="product.html" class="sf-with-ul">Product</a>
                                <ul>
                                    <li><a href="product.html">Default</a></li>
                                    <li><a href="product-centered.html">Centered</a></li>
                                    <li><a href="product-extended.html"><span>Extended Info<span
                                                    class="tip tip-new">New</span></span></a></li>
                                    <li><a href="product-gallery.html">Gallery</a></li>
                                    <li><a href="product-sticky.html">Sticky Info</a></li>
                                    <li><a href="product-sidebar.html">Boxed With Sidebar</a></li>
                                    <li><a href="product-fullwidth.html">Full Width</a></li>
                                    <li><a href="product-masonry.html">Masonry Sticky Info</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Pages</a>
                                <ul>
                                    <li>
                                        <a href="about.html">About</a>

                                        <ul>
                                            <li><a href="about.html">About 01</a></li>
                                            <li><a href="about-2.html">About 02</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="contact.html">Contact</a>

                                        <ul>
                                            <li><a href="contact.html">Contact 01</a></li>
                                            <li><a href="contact-2.html">Contact 02</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="faq.html">FAQs</a></li>
                                    <li><a href="404.html">Error 404</a></li>
                                    <li><a href="coming-soon.html">Coming Soon</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="blog.html">Blog</a>

                                <ul>
                                    <li><a href="blog.html">Classic</a></li>
                                    <li><a href="blog-listing.html">Listing</a></li>
                                    <li>
                                        <a href="#">Grid</a>
                                        <ul>
                                            <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                            <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                            <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                            <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Masonry</a>
                                        <ul>
                                            <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                            <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                            <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                            <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Mask</a>
                                        <ul>
                                            <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                            <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Single Post</a>
                                        <ul>
                                            <li><a href="single.html">Default with sidebar</a></li>
                                            <li><a href="single-fullwidth.html">Fullwidth no sidebar</a></li>
                                            <li><a href="single-fullwidth-sidebar.html">Fullwidth with sidebar</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="elements-list.html">Elements</a>
                                <ul>
                                    <li><a href="elements-products.html">Products</a></li>
                                    <li><a href="elements-typography.html">Typography</a></li>
                                    <li><a href="elements-titles.html">Titles</a></li>
                                    <li><a href="elements-banners.html">Banners</a></li>
                                    <li><a href="elements-product-category.html">Product Category</a></li>
                                    <li><a href="elements-video-banners.html">Video Banners</a></li>
                                    <li><a href="elements-buttons.html">Buttons</a></li>
                                    <li><a href="elements-accordions.html">Accordions</a></li>
                                    <li><a href="elements-tabs.html">Tabs</a></li>
                                    <li><a href="elements-testimonials.html">Testimonials</a></li>
                                    <li><a href="elements-blog-posts.html">Blog Posts</a></li>
                                    <li><a href="elements-portfolio.html">Portfolio</a></li>
                                    <li><a href="elements-cta.html">Call to Action</a></li>
                                    <li><a href="elements-icon-boxes.html">Icon Boxes</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav><!-- End .mobile-nav -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                    <nav class="mobile-cats-nav">
                        <ul class="mobile-cats-menu">
                            <li><a class="mobile-cats-lead" href="#">Daily offers</a></li>
                            <li><a class="mobile-cats-lead" href="#">Gift Ideas</a></li>
                            <li><a href="#">Beds</a></li>
                            <li><a href="#">Lighting</a></li>
                            <li><a href="#">Sofas & Sleeper sofas</a></li>
                            <li><a href="#">Storage</a></li>
                            <li><a href="#">Armchairs & Chaises</a></li>
                            <li><a href="#">Decoration </a></li>
                            <li><a href="#">Kitchen Cabinets</a></li>
                            <li><a href="#">Coffee & Tables</a></li>
                            <li><a href="#">Outdoor Furniture </a></li>
                        </ul><!-- End .mobile-cats-menu -->
                    </nav><!-- End .mobile-cats-nav -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i
                        class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i
                        class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i
                        class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i
                        class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin"
                                        role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register"
                                        role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel"
                                    aria-labelledby="signin-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="singin-email">Username or email address *</label>
                                            <input type="text" class="form-control" id="singin-email"
                                                name="singin-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">Password *</label>
                                            <input type="password" class="form-control" id="singin-password"
                                                name="singin-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="signin-remember">
                                                <label class="custom-control-label" for="signin-remember">Remember
                                                    Me</label>
                                            </div><!-- End .custom-checkbox -->

                                            <a href="#" class="forgot-link">Forgot Your Password?</a>
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel"
                                    aria-labelledby="register-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="register-email">Your email address *</label>
                                            <input type="email" class="form-control" id="register-email"
                                                name="register-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password">Password *</label>
                                            <input type="password" class="form-control" id="register-password"
                                                name="register-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="register-policy" required>
                                                <label class="custom-control-label" for="register-policy">I agree to
                                                    the <a href="#">privacy policy</a> *</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login  btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->




    {{-- <div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row no-gutters bg-white newsletter-popup-content">
                    <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                        <div class="banner-content text-center">
                            <img src="{{ asset('frontend/images/popup/newsletter/logo.png') }}" class="logo"
                                alt="logo" width="60" height="15">
                            <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>
                            <p>Subscribe to the Molla eCommerce newsletter to receive timely updates from your favorite
                                products.</p>
                            <form action="#">
                                <div class="input-group input-group-round">
                                    <input type="email" class="form-control form-control-white"
                                        placeholder="Your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn" type="submit"><span>go</span></button>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                <label class="custom-control-label" for="register-policy-2">Do not show this popup
                                    again</label>
                            </div><!-- End .custom-checkbox -->
                        </div>
                    </div>
                    <div class="col-xl-2-5col col-lg-5 ">
                        <img src="{{ asset('frontend/images/popup/newsletter/img-1.jpg') }}" class="newsletter-img"
                            alt="newsletter">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Plugins JS File -->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/superfish.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/demos/demo-4.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Quick View Modal Start -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><span id="pname"></span></h5>
                    <button type="button" class="close" id="closeModal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-4 p-5">
                            <div class="card" style="width: 18rem;">
                                <img src="..." class="card-img-top" style="width: 200px; height: 200px;"
                                    id="pimage">
                            </div>
                        </div>

                        <div class="col-md-5 p-5">
                            <ul class="list-group">
                                <li class="list-group-item">Fiyat :

                                    <strong class="text-success">
                                        <span id="pprice"></span> TL
                                    </strong>
                                    <del id="oldprice" class="text-danger"></del>

                                </li>
                                <a href="" id="pcategorylink">
                                    <li class="list-group-item">Kategori : <strong id="pcategory"></strong> </li>
                                </a>
                            </ul>
                        </div>

                        <div class="col-md-3 p-5">
                            <div class="form-group">
                                <label for="qty">Adet</label>
                                <input type="number" name="" id="qty" value="1" min="1"
                                    class="form-control">

                            </div>
                        </div>

                        <div class="p-5">
                            <input type="hidden" id="product_id">
                            <button type="submit" class="btn btn-primary btn-xs" onclick="addToCart()">Sepete
                                Ekle</button>
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- Quick View Modal End -->


    <!-- Toastr js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;
                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;
                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;
                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        //Start Product View with Modal

        function productView(id) {
            // alert(id)
            $.ajax({
                type: 'GET',
                url: '/product/view/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    $('#pname').text(data.product.product_name);
                    $('#price').text(data.product.selling_price);
                    $('#pcategory').text(data.product.category.category_name);
                    $('#pcategorylink').attr('href', 'product/category/' + data.product.category.id + '/' + data
                        .product.category.category_slug);
                    $('#pimage').attr('src', '/' + data.product.product_thambnail_photo);
                    $('#product_id').val(id);
                    $('#qty').val(1);
                    //Product Price

                    if (data.product.discount_price == null) {
                        $('#pprice').text('');
                        $('#oldprice').text('');
                        $('#pprice').text(data.product.selling_price);
                    } else {
                        $('#pprice').text(data.product.discount_price);
                        $('#oldprice').text(data.product.selling_price);
                    }

                }
            })
        }
        //End Product View with Modal


        //Start Add To Cart Product
        function addToCart() {
            var product_name = $('#pname').text();
            var id = $('#product_id').val();
            var quantity = $('#qty').val();
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {
                    quantity: quantity,
                    product_name: product_name
                },
                url: "/cart/data/store/" + id,
                success: function(data) {

                    miniCart()
                    $('#closeModal').click();
                    // console.log(data);

                    //Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                }
            })
        }
        //End Add To Cart Product
    </script>



    <script type="text/javascript">
        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                dataType: 'json',
                success: function(response) {
                    console.log(response)

                    $('span[id=cartSubTotal]').text(response.cartTotal);
                    $('#cartQty').text(response.cartQty);

                    var miniCart = ""
                    $.each(response.carts, function(key, value) {
                        miniCart += `<div class="product">
                                <div class="product-cart-details">
                                    <h4 class="product-title">
                                        <a href="product.html">${value.name}</a>
                                    </h4>

                                    <span class="cart-product-info">
                                        <span class="cart-product-qty"> ${value.qty}</span>
                                        x ${value.price}
                                    </span>
                                    
                                </div><!-- End .product-cart-details -->

                                <figure class="product-image-container">
                                    <a href="product.html" class="product-image">
                                        <img src="/${value.options.image}"
                                            alt="product">
                                    </a>
                                </figure>
                                <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)" class="btn-remove" title="Remove Product"><i
                                        class="icon-close"></i></button>
                                         

                            </div><!-- End .product -->`
                    });

                    $('#miniCart').html(miniCart);
                }
            })
        }
        miniCart();

        //Mini Cart Remove Start
        function miniCartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/minicart/product-remove/' + rowId,
                dataType: 'json',
                success: function(data) {
                    miniCart();
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    // End Message 
                }
            });
        }
        //Mini Cart Remove End
    </script>

    {{-- Add Wish List Start --}}
    <script type="text/javascript">
        function addToWishList(product_id) {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/add-to-wishlist/" + product_id,
                success: function(data) {
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message 
                }
            })
        }
    </script>
    {{-- Add Wish List End  --}}


    {{-- Load Wish List Start  --}}
    <script type="text/javascript">
        function wishlist() {
            $.ajax({
                type: 'GET',
                url: '/get-wishlist-product',
                dataType: 'json',
                success: function(response) {
                    // console.log(response)

                    var rows = ""

                    $.each(response, function(key, value) {
                        rows += ` <tr>
                            <td class="product-col">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="#">
                                            <img src="/${value.product.product_thambnail_photo}" alt="Product image">
                                        </a>
                                    </figure>

                                    <h3 class="product-title">
                                        <a href="#">${value.product.product_name}</a>
                                    </h3><!-- End .product-title -->
                                </div><!-- End .product -->
                            </td>
                            <td class="price-col">
                                ${value.product.discount_price == null
                                ? `${value.product.selling_price} TL`
                                : `<del> ${value.product.selling_price} TL </del><br>
                                                                                                                                                                                                                                                ${value.product.discount_price} TL`
                                }
                                </td>
                            <td class="stock-col"><span class="in-stock">In stock</span></td>
                          
                            <td class="remove-col">
                                <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)"> Add to Cart </button>
                                </td>
                                
                                <td>
                                    <button type="submit" id="${value.id}" onclick="wishlistRemove(this.id)" class="btn-remove" title="Remove Product"><i
                                        class="icon-close"></i></button>
                                    </td>
                        </tr>`
                    });

                    $('#wishlist').html(rows);
                }
            })
        }
        wishlist();

        //Wishlist Remove Start
        function wishlistRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/wishlist-remove/' + id,
                dataType: 'json',
                success: function(data) {
                    wishlist();
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message 
                }
            });
        }
        //Wishlist Remove End
    </script>
    {{-- Load Wish List End  --}}



    {{-- Load My Cart Page Start  --}}
    <script type="text/javascript">
        function cart() {
            $.ajax({
                type: 'GET',
                url: '/get-cart-product',
                dataType: 'json',
                success: function(response) {
                    // console.log(response)

                    var rows = ""

                    $.each(response.carts, function(key, value) {
                        rows += `  <tr>
                                        <td class="product-col">
                                            <div class="product">
                                                <figure class="product-media">
                                                    <a href="#">
                                                        <img src="/${value.options.image}"
                                                            alt="Product image">
                                                    </a>
                                                </figure>

                                                <h3 class="product-title">
                                                    <a href="#">${value.name}</a>
                                                </h3><!-- End .product-title -->
                                            </div><!-- End .product -->
                                        </td>
                                        <td class="price-col">
                                            ${value.price} TL
                                        </td>
                                        

                                

                                        <td class="quantity-col">
                                            <div class="cart-product-quantity">
                                                <div class="row">
                                                   
                                                   
                                            <button type="submit" id="${value.rowId}" 
                                                onclick="cartIncrement(this.id)" 
                                                class="btn-remove"><i class="icon-plus"></i>
                                                </button>
                                   
                                                    
                                             
                                                    <input type="text" class="form-control" value="${value.qty}" min="1"
                                                    max="10" step="1" data-decimals="0" required>


                                                        
                                                    ${value.qty > 1
                                            ? ` <button type="submit" id="${value.rowId}" 
                                                                                                                                                                                onclick="cartDecrement(this.id)" 
                                                                                                                                                                                class="btn-remove"><i class="icon-minus"></i>
                                                                                                                                                                                </button>`
                                    : ` <button type="submit" id="${value.rowId}" 
                                                                                                                                                                                onclick="cartDecrement(this.id)" 
                                                                                                                                                                                class="btn-remove" disabled><i class="icon-minus"></i>
                                                                                                                                                                                </button>`
                                    }


                                           

                                                    </div>
                                            </div><!-- End .cart-product-quantity -->
                                        </td>
                                        <td class="price-col">
                                            ${value.subtotal} TL
                                        </td>
                                        
                                       
                                        <td class="remove-col"><button type="submit" id="${value.rowId}" 
                                            onclick="cartRemove(this.id)" 
                                            class="btn-remove"><i
                                                    class="icon-close"></i></button></td>
                                    </tr>`
                    });

                    $('#cartPage').html(rows);
                }
            })
        }
        cart();

        //My Cart Page Remove Start
        function cartRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/cart-remove/' + id,
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    cart();
                    miniCart();
                    $('#couponField').show();
                    $('#coupon_name').val('');

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message 
                }
            });
        }
        //My Cart Page Remove End

        // Cart Increment Start
        function cartIncrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart-increment/" + rowId,
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    cart();
                    miniCart();
                }
            });

        }
        // Cart Increment End

        // Cart Decrement Start
        function cartDecrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart-decrement/" + rowId,
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    cart();
                    miniCart();
                }
            });

        }
        // Cart Decrement End
    </script>
    {{-- Load My Cart Page End  --}}

    {{-- Coupon Apply Start --}}
    <script type="text/javascript">
        function applyCoupon() {
            var coupon_name = $('#coupon_name').val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    coupon_name: coupon_name
                },
                url: "{{ url('/coupon-apply') }}",
                success: function(data) {
                    couponCalculation();
                    $('#couponField').hide();
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message 
                }
            });
        }

        function couponCalculation() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/coupon-calculation') }}",
                dataType: 'json',
                success: function(data) {
                    if (data.total) {
                        $('#couponCalField').html(
                            `<tr class="summary-subtotal">
                                             <td>Subtotal:</td>
                                             <td>${data.total} TL</td>
                                         </tr><!-- End .summary-subtotal -->
                                         <tr class="summary-shipping">
                                             <td>Grand Total:</td>
                                             <td>${data.total} TL</td>
                                         </tr>
                                       `
                        )
                    } else {
                        $('#couponCalField').html(
                            `<tr class="summary-subtotal">
                                             <td>Toplam Tutar:</td>
                                             <td>${data.subtotal} TL</td>
                                         </tr><!-- End .summary-subtotal -->

                                         <tr class="summary-subtotal">
                                             <td>Kupon Adı:</td>
                                             <td>${data.coupon_name}</td>
                                             <td class="remove-col"><button type="submit" id="" 
                                            onclick="couponRemove()" 
                                            class="btn-remove"><i
                                                    class="icon-close"></i></button></td>
                                         </tr><!-- End .summary-subtotal -->

                                         <tr class="summary-subtotal">
                                             <td>Kupon Oranı:</td>
                                             <td>${data.coupon_discount}%</td>
                                         </tr><!-- End .summary-subtotal -->

                                         <tr class="summary-subtotal">
                                             <td>Kupon İndirimi:</td>
                                             <td> - ${data.discount_amount} TL</td>
                                         </tr><!-- End .summary-subtotal -->


                                      


                                         <tr class="summary-shipping">
                                             <td>Ödenecek Tutar:</td>
                                             <td>${data.total_amount} TL</td>
                                         </tr>

                                       `
                        )
                    }
                }
            })
        }
        couponCalculation();
    </script>

    {{-- Coupon Apply End --}}


    {{-- Coupon Remove Start --}}

    <script type="text/javascript">
        function couponRemove() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/coupon-remove') }}",
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    $('#couponField').show();
                    $('#coupon_name').val('');
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message 
                }
            })
        }
    </script>
    {{-- Coupon Remove End --}}



</body>



</html>
