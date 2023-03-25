@extends('frontend.main_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Checkout<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <div class="checkout-discount">

                    </div><!-- End .checkout-discount -->

                    <div class="row">
                        <div class="col-lg-9">
                            {{-- <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title --> --}}
                            <div class="row">


                                <form action="{{ route('cash.order') }}" method="POST" id="payment-form">
                                    @csrf
                                    <div class="form-row">
                                        <label for="card-element">
                                         
                                          <h2>Ödeme Kapıda Yapılacak</h2>

                                            <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                            <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                                            <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                                            <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                                            <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                                            <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                                            <input type="hidden" name="notes" value="{{ $data['notes'] }}">


                                        </label>

                                       
                                    </div>
                                    <br>
                                    <button class="btn btn-primary">Submit Payment</button>
                                </form>


                            </div><!-- End .row -->







                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Ürün</th>
                                            <th>Adet</th>
                                            <th>Birim Fiyat</th>
                                        </tr>
                                    </thead>

                                    <tbody>




                                        @if (Session::has('coupon'))
                                            <tr>
                                                <td>Subtotal:</td>
                                                <td>{{ $cartTotal }} TL</td>
                                            </tr><!-- End .summary-subtotal -->

                                            <tr>
                                                <td>Kupon :</td>
                                                <td>{{ session()->get('coupon')['coupon_name'] }} /
                                                    %{{ session()->get('coupon')['coupon_discount'] }}</td>
                                            </tr>

                                            <tr>
                                                <td>Kupon İndirim:</td>
                                                <td>{{ session()->get('coupon')['discount_amount'] }} TL</td>
                                            </tr>

                                            <tr class="summary-total">
                                                <td>Grand Total:</td>
                                                <td>{{ session()->get('coupon')['total_amount'] }} TL</td>
                                            </tr><!-- End .summary-total -->
                                        @else
                                            <tr>
                                                <td>Subtotal:</td>
                                                <td>{{ $cartTotal }} TL</td>
                                            </tr><!-- End .summary-subtotal -->

                                            <tr class="summary-total">
                                                <td>Grand Total:</td>
                                                <td>{{ $cartTotal }} TL</td>
                                            </tr><!-- End .summary-total -->
                                        @endif



                                    </tbody>
                                </table><!-- End .table table-summary -->


                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->

                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
