@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Bekleyen Sipariş Detay</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Bekleyen Siparişler </a></li>
                                <li class="breadcrumb-item active">Bekleyen Sipariş Detay</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">



                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                <div class="row">


                                    <div class="col-md-6">
                                        <div class="card card-body">
                                            <h3 class="card-title">Kargo Bilgileri</h3>
                                            <hr>
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
                                    </div>


                                    <div class="col-md-6">
                                        <div class="card card-body">
                                            <h3 class="card-title"> <span class="text-danger">
                                                    {{ $order->invoice_no }}</span>
                                                Numaralı Sipariş Detayı</h3>
                                            <hr>
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
                                    </div>


                                </div>

                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="row no-gutters align-items-center">

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

                                                                    <img src="{{ asset($item->product->product_thambnail_photo) }}"
                                                                        alt="Product image"
                                                                        style="width: 80px; height: 80px;">

                                                                </td>
                                                                <td>

                                                                    {{ $item->product->product_name }}

                                                                </td>
                                                                <td>{{ $item->qty }}</td>
                                                                <td class="price-col">{{ $item->price }} TL
                                                                </td>
                                                                <td class="price-col">{{ $item->price * $item->qty }} TL
                                                                </td>

                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table><!-- End .table table-wishlist -->
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->








        </div> <!-- container-fluid -->
    </div>
@endsection
