@extends('frontend.main_master')
@section('content')
    <main class="main">
        <div class="page-header text-center"
            style="background-image: url('{{ asset('frontend/images/page-header-bg.jpg') }}')">
            <div class="container">
                <h1 class="page-title">Siparişlerim</h1>
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
                <table class="table table-wishlist table-mobile">
                    <thead>
                        <tr>
                            <th>Tarih</th>
                            <th>Toplam Tutar</th>
                            <th>Ödeme</th>
                            <th>Fatura</th>
                            <th>Sipariş Durum</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                            <tr>

                                <td class="price-col">{{ $order->order_date }}</td>
                                <td class="stock-col">{{ $order->amount }} TL</td>
                                <td class="stock-col">{{ $order->payment_method }}</td>
                                <td class="stock-col"> {{ $order->invoice_no }}</td>


                                <td class="stock-col">
                                    @if ($order->status == 'Pending')
                                        <span style="color: #800080; font-weight: 600;"> Onay
                                            Bekliyor
                                        </span>
                                    @elseif($order->status == 'Confirmed')
                                        <span style="color: #0000FF; font-weight: 600;"> Onaylandı
                                        </span>
                                    @elseif($order->status == 'Processing')
                                        <span style="color: #FFA500; font-weight: 600;">
                                            İşleme Alındı </span>
                                    @elseif($order->status == 'Picked')
                                        <span style="color: #808000; font-weight: 600;">
                                            Hazırlanıyor
                                        </span>
                                    @elseif($order->status == 'Shipped')
                                        <span style="color: #808080; font-weight: 600;"> Kargoya
                                            Verildi
                                        </span>
                                    @elseif($order->status == 'Delivered')
                                        <span style="color: #008000; font-weight: 600;"> Teslim
                                            Edildi
                                        </span>
<br>
                                        <span style="color: #FF0000; font-weight: 600;"> 
                                            @if ($order->return_order == 1)
                                                İade Talebi Gönderildi
                                            @endif
                                        </span>
                                    @else
                                        <span style="color: #FF0000; font-weight: 600;"> İptal Edildi
                                        </span>
                                    @endif
                                </td>






                                <td>
                                    <a href="{{ url('order_details/' . $order->id) }}">
                                        <button class="btn btn-primary">Görüntüle</button>
                                    </a>

                                </td>
                                <td>
                                    <a href="{{ url('invoice_download/' . $order->id) }}" target="_blank">
                                        <button class="btn btn-info">İndir</button>
                                    </a>
                                </td>

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
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
