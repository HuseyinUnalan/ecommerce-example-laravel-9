 @extends('frontend.main_master')
 @section('content')
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://js.stripe.com/v3/"></script>

     <style>
         /**
                               * The CSS shown here will not be introduced in the Quickstart guide, but shows
                               * how you can use CSS to style your Element's container.
                               */
         .StripeElement {
             box-sizing: border-box;
             height: 40px;
             width: 540px;
             padding: 10px 12px;
             border: 1px solid transparent;
             border-radius: 4px;
             background-color: white;
             box-shadow: 0 1px 3px 0 #e6ebf1;
             -webkit-transition: box-shadow 150ms ease;
             transition: box-shadow 150ms ease;
         }

         .StripeElement--focus {
             box-shadow: 0 1px 3px 0 #cfd7df;
         }

         .StripeElement--invalid {
             border-color: #fa755a;
         }

         .StripeElement--webkit-autofill {
             background-color: #fefde5 !important;
         }
     </style>

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
                             <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                             <div class="row">


                                 <form action="{{ route('stripe.order') }}" method="POST" id="payment-form">
                                     @csrf
                                     <div class="form-row">
                                         <label for="card-element">

                                            <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                            <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                                            <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                                            <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                                            <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                                            <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                                            <input type="hidden" name="notes" value="{{ $data['notes'] }}"> 


                                         </label>

                                         <div id="card-element">
                                             <!-- A Stripe Element will be inserted here. -->
                                         </div>
                                         <!-- Used to display form errors. -->
                                         <div id="card-errors" role="alert"></div>
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


     <script type="text/javascript">
         // Create a Stripe client.
         var stripe = Stripe(
             'pk_test_51Mko1CCNaHyzAJJLksX8uIrxdO5qBSSOgAxUwYybm6aOiXkFyspRqxHT79Ve4TGtkoxLTQLNNbANCQtTON7Cmkwf009QB7K35L'
             );
         // Create an instance of Elements.
         var elements = stripe.elements();
         // Custom styling can be passed to options when creating an Element.
         // (Note that this demo uses a wider set of styles than the guide below.)
         var style = {
             base: {
                 color: '#32325d',
                 fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                 fontSmoothing: 'antialiased',
                 fontSize: '16px',
                 '::placeholder': {
                     color: '#aab7c4'
                 }
             },
             invalid: {
                 color: '#fa755a',
                 iconColor: '#fa755a'
             }
         };
         // Create an instance of the card Element.
         var card = elements.create('card', {
             style: style
         });
         // Add an instance of the card Element into the `card-element` <div>.
         card.mount('#card-element');
         // Handle real-time validation errors from the card Element.
         card.on('change', function(event) {
             var displayError = document.getElementById('card-errors');
             if (event.error) {
                 displayError.textContent = event.error.message;
             } else {
                 displayError.textContent = '';
             }
         });
         // Handle form submission.
         var form = document.getElementById('payment-form');
         form.addEventListener('submit', function(event) {
             event.preventDefault();
             stripe.createToken(card).then(function(result) {
                 if (result.error) {
                     // Inform the user if there was an error.
                     var errorElement = document.getElementById('card-errors');
                     errorElement.textContent = result.error.message;
                 } else {
                     // Send the token to your server.
                     stripeTokenHandler(result.token);
                 }
             });
         });
         // Submit the form with the token ID.
         function stripeTokenHandler(token) {
             // Insert the token ID into the form so it gets submitted to the server
             var form = document.getElementById('payment-form');
             var hiddenInput = document.createElement('input');
             hiddenInput.setAttribute('type', 'hidden');
             hiddenInput.setAttribute('name', 'stripeToken');
             hiddenInput.setAttribute('value', token.id);
             form.appendChild(hiddenInput);
             // Submit the form
             form.submit();
         }
     </script>
 @endsection
