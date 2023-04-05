 @extends('frontend.main_master')
 @section('content')
     <main class="main">

         <div class="page-header text-center"
             style="background-image: url('{{ asset('frontend/images/page-header-bg.jpg') }}')">
             <div class="container">
                 <h1 class="page-title">Alışveriş Sepeti</h1>
             </div><!-- End .container -->
         </div><!-- End .page-header -->
         <nav aria-label="breadcrumb" class="breadcrumb-nav">
             <div class="container">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{ route('/') }}">Anasayfa</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Alışveriş Sepeti</li>
                 </ol>
             </div><!-- End .container -->
         </nav><!-- End .breadcrumb-nav -->

         <div class="page-content">
             <div class="cart">
                 <div class="container">
                     <div class="row">
                         <div class="col-lg-9">
                             <table class="table table-cart table-mobile">
                                 <thead>
                                     <tr>
                                         <th>Ürün</th>
                                         <th>Birim Fiyat</th>
                                         <th>Adet</th>
                                         <th>Toplam Fiyat</th>
                                         <th></th>
                                     </tr>
                                 </thead>

                                 <tbody id="cartPage">


                                 </tbody>
                             </table><!-- End .table table-wishlist -->


                             @if (Session::has('coupon'))
                             @else
                                 <div class="cart-bottom" id="couponField">
                                     <div class="cart-discount">
                                         {{-- <form action="#"> --}}
                                         <div class="input-group">
                                             <input type="text" class="form-control" required placeholder="coupon code"
                                                 id="coupon_name">
                                             <div class="input-group-append">
                                                 <button class="btn btn-outline-primary-2" type="submit"
                                                     onclick="applyCoupon()"><i class="icon-long-arrow-right"></i></button>
                                             </div><!-- .End .input-group-append -->
                                         </div><!-- End .input-group -->
                                         {{-- </form> --}}
                                     </div><!-- End .cart-discount -->

                                     <a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i
                                             class="icon-refresh"></i></a>
                                 </div><!-- End .cart-bottom -->
                             @endif
                         </div><!-- End .col-lg-9 -->
                         <aside class="col-lg-3">
                             <div class="summary summary-cart">
                                 <h3 class="summary-title">Sepet Bilgisi</h3><!-- End .summary-title -->

                                 <table class="table table-summary">
                                     <tbody id="couponCalField">

                                     </tbody>
                                 </table><!-- End .table table-summary -->

                                 <a href="{{ route('checkout') }}" type="submit"
                                     class="btn btn-outline-primary-2 btn-order btn-block">Ödeme Sayfasına Git</a>
                             </div><!-- End .summary -->


                         </aside><!-- End .col-lg-3 -->
                     </div><!-- End .row -->
                 </div><!-- End .container -->
             </div><!-- End .cart -->
         </div><!-- End .page-content -->
     </main><!-- End .main -->
 @endsection
