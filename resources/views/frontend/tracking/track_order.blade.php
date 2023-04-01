@extends('frontend.main_master')
@section('content')
    <style type="text/css">
        body {
            background-color: #eeeeee;
            font-family: 'Open Sans', serif
        }

        .container {}

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 0.10rem
        }

        .card-header:first-child {
            border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
        }

        .card-header {
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1)
        }

        .track {
            position: relative;
            background-color: #ddd;
            height: 7px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 60px;
            margin-top: 50px
        }

        .track .step {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            width: 25%;
            margin-top: -18px;
            text-align: center;
            position: relative
        }

        .track .step.active:before {
            background: #3399ff
        }

        .track .step::before {
            height: 7px;
            position: absolute;
            content: "";
            width: 100%;
            left: 0;
            top: 18px
        }

        .track .step.active .icon {
            background: #3399ff;
            color: #fff
        }

        .track .icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            position: relative;
            border-radius: 100%;
            background: #ddd
        }

        .track .step.active .text {
            font-weight: 400;
            color: #000
        }

        .track .text {
            display: block;
            margin-top: 7px
        }

        .itemside {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            width: 100%
        }

        .itemside .aside {
            position: relative;
            -ms-flex-negative: 0;
            flex-shrink: 0
        }

        .img-sm {
            width: 80px;
            height: 80px;
            padding: 7px
        }

        ul.row,
        ul.row-sm {
            list-style: none;
            padding: 0
        }

        .itemside .info {
            padding-left: 15px;
            padding-right: 7px
        }

        .itemside .title {
            display: block;
            margin-bottom: 5px;
            color: #212529
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem
        }

        .btn-warning {
            color: #ffffff;
            background-color: #3399ff;
            border-color: #3399ff;
            border-radius: 1px
        }

        .btn-warning:hover {
            color: #ffffff;
            background-color: #3399ff;
            border-color: #3399ff;
            border-radius: 1px
        }
    </style>


    <div class="container mt-5 mb-5">
        <article class="card">
            <header class="card-header"> My Orders / Tracking </header>
            <div class="card-body">
                <div class="row" style="margin-left: 20px; margin-top: 20px;">
                    <div class="col-md-2">
                        <b>Fatura No : </b> {{ $track->invoice_no }}
                    </div>

                    <div class="col-md-2">
                        Sipariş Tarihi : {{ $track->order_date }}
                    </div>

                    <div class="col-md-2">
                        <b> Kargo Sahibi / Adres : </b><br>
                        {{ $track->name }} - {{ $track->division->division_name }} / {{ $track->district->districts_name }}
                    </div>

                    <div class="col-md-2">
                        <b>Telefon : </b> {{ $track->phone }}
                    </div>

                    <div class="col-md-2">
                        <b>Ödeme Türü : </b> {{ $track->payment_method }}
                    </div>

                    <div class="col-md-2">
                        <b> Toplam Tutar : </b><br>
                        {{ $track->amount }} TL
                    </div>
                </div>


                <div class="track">


                    @if ($track->status == 'Pending')
                        <div class="step active">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text">Onay Bekliyor
                            </span>
                        </div>

                        <div class="step">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text">
                                Onaylandı
                            </span>
                        </div>


                        <div class="step">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text"> Hazırlanıyor
                            </span>
                        </div>

                        <div class="step">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text">Hazırlandı</span>
                        </div>

                        <div class="step">
                            <span class="icon">
                                <i class="fa fa-truck"></i>
                            </span>
                            <span class="text"> Kargoya Verildi
                            </span>
                        </div>

                        <div class="step">
                            <span class="icon">
                                <i class="fa fa-box"></i>
                            </span>
                            <span class="text">Teslim Edildi</span>
                        </div>

                        @elseif ($track->status == 'Confirmed')
                        <div class="step active">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text">Onay Bekliyor
                            </span>
                        </div>

                        <div class="step active">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text">
                                Onaylandı
                            </span>
                        </div>


                        <div class="step">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text"> Hazırlanıyor
                            </span>
                        </div>

                        <div class="step">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text">Hazırlandı</span>
                        </div>

                        <div class="step">
                            <span class="icon">
                                <i class="fa fa-truck"></i>
                            </span>
                            <span class="text"> Kargoya Verildi
                            </span>
                        </div>

                        <div class="step">
                            <span class="icon">
                                <i class="fa fa-box"></i>
                            </span>
                            <span class="text">Teslim Edildi</span>
                        </div>


                        @elseif ($track->status == 'Processing')
                        <div class="step active">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text">Onay Bekliyor
                            </span>
                        </div>

                        <div class="step active">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text">
                                Onaylandı
                            </span>
                        </div>


                        <div class="step active">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text"> Hazırlanıyor
                            </span>
                        </div>

                        <div class="step">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text">Hazırlandı</span>
                        </div>

                        <div class="step">
                            <span class="icon">
                                <i class="fa fa-truck"></i>
                            </span>
                            <span class="text"> Kargoya Verildi
                            </span>
                        </div>

                        <div class="step">
                            <span class="icon">
                                <i class="fa fa-box"></i>
                            </span>
                            <span class="text">Teslim Edildi</span>
                        </div>

                        
                        @elseif ($track->status == 'Picked')
                        <div class="step active">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text">Onay Bekliyor
                            </span>
                        </div>

                        <div class="step active">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text">
                                Onaylandı
                            </span>
                        </div>


                        <div class="step active">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text"> Hazırlanıyor
                            </span>
                        </div>

                        <div class="step active">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text">Hazırlandı</span>
                        </div>

                        <div class="step">
                            <span class="icon">
                                <i class="fa fa-truck"></i>
                            </span>
                            <span class="text"> Kargoya Verildi
                            </span>
                        </div>

                        <div class="step">
                            <span class="icon">
                                <i class="fa fa-box"></i>
                            </span>
                            <span class="text">Teslim Edildi</span>
                        </div>

                        @elseif ($track->status == 'Shipped')
                        <div class="step active">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text">Onay Bekliyor
                            </span>
                        </div>

                        <div class="step active">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text">
                                Onaylandı
                            </span>
                        </div>


                        <div class="step active">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text"> Hazırlanıyor
                            </span>
                        </div>

                        <div class="step active">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text">Hazırlandı</span>
                        </div>

                        <div class="step active">
                            <span class="icon">
                                <i class="fa fa-truck"></i>
                            </span>
                            <span class="text"> Kargoya Verildi
                            </span>
                        </div>

                        <div class="step">
                            <span class="icon">
                                <i class="fa fa-box"></i>
                            </span>
                            <span class="text">Teslim Edildi</span>
                        </div>

                        @elseif ($track->status == 'Delivered')
                        <div class="step active">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text">Onay Bekliyor
                            </span>
                        </div>

                        <div class="step active">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text">
                                Onaylandı
                            </span>
                        </div>


                        <div class="step active">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text"> Hazırlanıyor
                            </span>
                        </div>

                        <div class="step active">
                            <span class="icon">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text">Hazırlandı</span>
                        </div>

                        <div class="step active">
                            <span class="icon">
                                <i class="fa fa-truck"></i>
                            </span>
                            <span class="text"> Kargoya Verildi
                            </span>
                        </div>

                        <div class="step active">
                            <span class="icon">
                                <i class="fa fa-box"></i>
                            </span>
                            <span class="text">Teslim Edildi</span>
                        </div>



                    @endif



                </div>


                <hr><br><br>


            </div>
        </article>
    </div>
@endsection
