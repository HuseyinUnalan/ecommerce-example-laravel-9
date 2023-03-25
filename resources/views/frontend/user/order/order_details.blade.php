@extends('frontend.main_master')
@section('content')
    <main class="main">
        <div class="page-header text-center"
            style="background-image: url('{{ asset('frontend/images/page-header-bg.jpg') }}')">
            <div class="container">
                <h1 class="page-title">Siparişlerim<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('/') }}">Anasayfa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Siparişlerim</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">

                <div class="row">



                    <div class="col-md-6">
                        <div class="card-header">
                            <h4>
                                <span class="text-danger"> {{ $order->invoice_no }}</span>
                                Kargo Bilgileri
                            </h4>
                        </div>
                        <table class="table">
                            <tr>
                                <th> Ad Soyad : </th>
                                <th> {{ $order->name }} </th>
                            </tr>

                            <tr>
                                <th> Telefon Numarası : </th>
                                <th> {{ $order->phone }} </th>
                            </tr>

                            <tr>
                                <th> Email Adresi : </th>
                                <th> {{ $order->email }} </th>
                            </tr>

                            <tr>
                                <th> İl : </th>
                                <th> {{ $order->division->division_name }} </th>
                            </tr>

                            <tr>
                                <th> İlçe : </th>
                                <th> {{ $order->district->districts_name }} </th>
                            </tr>

                            <tr>
                                <th> Açıklama : </th>
                                <th> {{ $order->notes }} </th>
                            </tr>


                            <tr>
                                <th> Posta Kodu : </th>
                                <th> {{ $order->post_code }} </th>
                            </tr>

                            <tr>
                                <th> Sipariş Tarihi : </th>
                                <th> {{ $order->order_date }} </th>
                            </tr>

                        </table>
                    </div>


                    <div class="col-md-6">
                        <div class="card-header">
                            <h4>
                                <span class="text-danger"> {{ $order->invoice_no }}</span>
                                Numaralı Sipariş Detayı
                            </h4>
                        </div>
                        <table class="table">
                            <tr>
                                <th> Ad Soyad : </th>
                                <th> {{ $order->user->name }} </th>
                            </tr>



                            <tr>
                                <th> Ödeme Türü : </th>
                                <th> {{ $order->payment_method }} </th>
                            </tr>

                            <tr>
                                <th> İşlem ID : </th>
                                <th> {{ $order->transaction_id }} </th>
                            </tr>

                            <tr>
                                <th> Fatura : </th>
                                <th class="text-danger"> {{ $order->invoice_no }} </th>
                            </tr>

                            <tr>
                                <th> Sipariş Toplamı : </th>
                                <th>{{ $order->amount }} TL</th>
                            </tr>

                            <tr>
                                <th> Sipariş Durumu : </th>
                                <th>
                                    {{ $order->status }} </th>
                            </tr>



                        </table>
                    </div>

                    <table class="table table-wishlist table-mobile">
                        <thead>
                            <tr>
                                <th>Resim</th>
                                <th>Ürün</th>
                                <th>Adet</th>
                                <th>Fiyat</th>
                                <th>Adet * Fiyat</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($orderItem as $item)
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="{{ asset($item->product->product_thambnail_photo) }}"
                                                        alt="Product image">
                                                </a>
                                            </figure>


                                        </div><!-- End .product -->
                                    </td>
                                    <td>
                                        <h3 class="product-title">
                                            <a href="#">{{ $item->product->product_name }}</a>
                                        </h3><!-- End .product-title -->
                                    </td>
                                    <td>{{ $item->qty }}</td>
                                    <td class="price-col">{{ $item->price }} TL
                                    </td>
                                    <td class="price-col">{{ $item->price * $item->qty }} TL</td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table><!-- End .table table-wishlist -->


                    <div class="wishlist-share">
                        <div class="social-icons social-icons-sm mb-2">
                            <label class="social-label">Share on:</label>
                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                    class="icon-facebook-f"></i></a>
                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                    class="icon-twitter"></i></a>
                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                    class="icon-instagram"></i></a>
                            <a href="#" class="social-icon" title="Youtube" target="_blank"><i
                                    class="icon-youtube"></i></a>
                            <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                                    class="icon-pinterest"></i></a>
                        </div><!-- End .soial-icons -->
                    </div><!-- End .wishlist-share -->
                </div>
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
