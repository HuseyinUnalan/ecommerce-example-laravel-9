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
                        <form action="#">
                            <input type="text" class="form-control" required id="checkout-discount-input">
                            <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to
                                    enter your code</span></label>
                        </form>
                    </div><!-- End .checkout-discount -->
                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Ad Soyad *</label>
                                        <input type="text" class="form-control" required value="{{ Auth::user()->name }}"
                                            name="shipping_name">
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>E-mail *</label>
                                        <input type="text" class="form-control" required
                                            value="{{ Auth::user()->email }}" name="shipping_email">
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Telefon *</label>
                                        <input type="tel" placeholder="555 555 55 55"
                                            pattern="[0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}" class="form-control" required
                                            name="shipping_phone">
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Posta Kodu *</label>
                                        <input type="text" class="form-control" required name="post_code">
                                    </div><!-- End .col-sm-6 -->


                                    <div class="col-sm-6">
                                        <label>İl Seç</label>
                                        <select name="division_id" class="form-control" aria-label="Default select example"
                                            required>
                                            <option value="" selected="" disabled="">İl Seç</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">
                                                    {{ $division->division_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- end row -->

                                    <div class="col-sm-6">
                                        <label>İlçe Seç</label>
                                        <select name="district_id" class="form-control" aria-label="Default select example"
                                            required>
                                            <option value="" selected="" disabled="">İlçe Seç</option>
                                        </select>
                                    </div>
                                    <!-- end row -->






                                    <div class="col-sm-12">
                                        <label>Not</label>
                                        <textarea name="notes" id="" cols="4" rows="4" class="form-control"></textarea>
                                    </div>
                                    <!-- end row -->


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

                                            @foreach ($carts as $cart)
                                                <tr>
                                                    <td><img src="{{ asset($cart->options->image) }}"
                                                            style="width: 50px;height: 50px;" alt=""></td>
                                                    <td>{{ $cart->qty }} </td>
                                                    <td>{{ $cart->price }} TL</td>
                                                </tr>
                                            @endforeach


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

                                    <div class="accordion-summary" id="accordion-payment">


                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="">Stripe</label>
                                                <input type="radio" name="payment_method" value="stripe">
                                            </div> <!-- end col md 4 -->

                                            <div class="col-md-4">
                                                <label for="">Card</label>
                                                <input type="radio" name="payment_method" value="card">
                                            </div> <!-- end col md 4 -->

                                            <div class="col-md-4">
                                                <label for="">Cash</label>
                                                <input type="radio" name="payment_method" value="cash">
                                            </div> <!-- end col md 4 -->
                                           <hr>
                                           
                                            <div class="col-md-12">
                                                <img src="{{ asset('frontend/images/payments.png') }}">
                                            </div> <!-- end col md 4 -->


                                        </div><!-- End .accordion -->

                                        <hr>
                                        <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                            <span class="btn-text">Place Order</span>
                                            <span class="btn-hover-text">Proceed to Checkout</span>
                                        </button>
                                    </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="division_id"]').on('change', function() {
                var division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: "{{ url('/district-get/ajax') }}/" + division_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="district_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="district_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .districts_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

        });
    </script>
@endsection
