@extends('admin.admin_master')
@section('admin')
    @php
        
        $aylar = [
            'January' => 'Ocak',
            'February' => 'Şubat',
            'March' => 'Mart',
            'April' => 'Nisan',
            'May' => 'Mayıs',
            'June' => 'Haziran',
            'July' => 'Temmuz',
            'August' => 'Ağustos',
            'September' => 'Eylül',
            'October' => 'Ekim',
            'November' => 'Kasım',
            'December' => 'Aralık',
            'Monday' => 'Pazartesi',
            'Tuesday' => 'Salı',
            'Wednesday' => 'Çarşamba',
            'Thursday' => 'Perşembe',
            'Friday' => 'Cuma',
            'Saturday' => 'Cumartesi',
            'Sunday' => 'Pazar',
            'Jan' => 'Oca',
            'Feb' => 'Şub',
            'Mar' => 'Mar',
            'Apr' => 'Nis',
            'May' => 'May',
            'Jun' => 'Haz',
            'Jul' => 'Tem',
            'Aug' => 'Ağu',
            'Sep' => 'Eyl',
            'Oct' => 'Eki',
            'Nov' => 'Kas',
            'Dec' => 'Ara',
        ];
        
        $date = Carbon\Carbon::now()->format('d F Y');
        $today = App\Models\Order::where('order_date', strtr($date, $aylar))->sum('amount');
        
        $thisday = Carbon\Carbon::now()->format('d F Y');
        $todaycount = App\Models\Order::where('order_date', strtr($thisday, $aylar))->get();
        
        $month = date('F');
        $month = App\Models\Order::where('order_month', strtr($month, $aylar))->sum('amount');
        
        $thismonth = date('F');
        $monthcount = App\Models\Order::where('order_month', strtr($thismonth, $aylar))->get();
        
        $year = date('Y');
        $year = App\Models\Order::where('order_year', strtr($year, $aylar))->sum('amount');
        
        $thisyear = date('Y');
        $yearcount = App\Models\Order::where('order_year', $thisyear)->get();
        
        $pending = App\Models\Order::where('status', 'Pending')->get();
        
        $users = App\Models\User::get();
        
        $products = App\Models\Product::get();
        
        $delivered = App\Models\Order::where('status', 'Delivered')->get();
        
    @endphp

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Bugünlük Satış Geliri</p>
                                    <h4 class="mb-2">{{ $today }} TL</h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="mdi mdi-currency-usd font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Aylık Satış Geliri</p>
                                    <h4 class="mb-2">{{ $month }} TL</h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="mdi mdi-currency-usd font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Yıllık Satış Geliri</p>
                                    <h4 class="mb-2">{{ $year }} TL</h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="mdi mdi-currency-usd font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->


                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Günlük Toplam Satış</p>
                                    <h4 class="mb-2">{{ count($todaycount) }}</h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="ri-shopping-cart-2-line font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Aylık Toplam Satış</p>
                                    <h4 class="mb-2">{{ count($monthcount) }}</h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="ri-shopping-cart-2-line font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Yıllık Toplam Satış</p>
                                    <h4 class="mb-2">{{ count($yearcount) }}</h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="ri-shopping-cart-2-line font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->





                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Onay Bekleyen Siparişler</p>
                                    <h4 class="mb-2">{{ count($pending) }} </h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-warning rounded-3">
                                        <i class="fas fa-clipboard-list font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Toplam Kullanıcı Sayısı</p>
                                    <h4 class="mb-2">{{ count($users) }} </h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-warning rounded-3">
                                        <i class="ri-user-3-line font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Toplam Ürün Sayısı</p>
                                    <h4 class="mb-2">{{ count($products) }} </h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-warning rounded-3">
                                        <i class="fas fa-clipboard-list font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->

            </div><!-- end row -->

            {{-- <div class="row">
                <div class="col-xl-6">

                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="float-end d-none d-md-inline-block">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted">Report<i class="mdi mdi-chevron-down ms-1"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Export</a>
                                        <a class="dropdown-item" href="#">Import</a>
                                        <a class="dropdown-item" href="#">Download Report</a>
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-title mb-4">Email Sent</h4>

                            <div class="text-center pt-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div class="d-inline-flex">
                                            <h5 class="me-2">25,117</h5>
                                            <div class="text-success font-size-12">
                                                <i class="mdi mdi-menu-up font-size-14"> </i>2.2 %
                                            </div>
                                        </div>
                                        <p class="text-muted text-truncate mb-0">Marketplace</p>
                                    </div><!-- end col -->
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div class="d-inline-flex">
                                            <h5 class="me-2">$34,856</h5>
                                            <div class="text-success font-size-12">
                                                <i class="mdi mdi-menu-up font-size-14"> </i>1.2 %
                                            </div>
                                        </div>
                                        <p class="text-muted text-truncate mb-0">Last Week</p>
                                    </div><!-- end col -->
                                    <div class="col-sm-4">
                                        <div class="d-inline-flex">
                                            <h5 class="me-2">$18,225</h5>
                                            <div class="text-success font-size-12">
                                                <i class="mdi mdi-menu-up font-size-14"> </i>1.7 %
                                            </div>
                                        </div>
                                        <p class="text-muted text-truncate mb-0">Last Month</p>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div>
                        </div>
                        <div class="card-body py-0 px-2">
                            <div id="area_chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="float-end d-none d-md-inline-block">
                                <div class="dropdown">
                                    <a class="text-reset" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <span class="text-muted">This Years<i
                                                class="mdi mdi-chevron-down ms-1"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Last Week</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">This Year</a>
                                    </div>
                                </div>
                            </div>
                            <h4 class="card-title mb-4">Revenue</h4>

                            <div class="text-center pt-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div>
                                            <h5>17,493</h5>
                                            <p class="text-muted text-truncate mb-0">Marketplace</p>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div>
                                            <h5>$44,960</h5>
                                            <p class="text-muted text-truncate mb-0">Last Week</p>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-sm-4">
                                        <div>
                                            <h5>$29,142</h5>
                                            <p class="text-muted text-truncate mb-0">Last Month</p>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div>
                        </div>
                        <div class="card-body py-0 px-2">
                            <div id="column_line_chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div> --}}
            <!-- end row -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title mb-4">Teslim Edilen Siparişler</h4>

                            <div class="table-responsive">
                                <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Tarih</th>
                                            <th>Fatura</th>
                                            <th>Tutar</th>
                                            <th>Ödeme Türü</th>
                                            <th>Durum</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        @php($i = 1)
                                        @foreach ($delivered as $item)
                                            <tr class="odd">
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $item->order_date }}</td>
                                                <td>{{ $item->invoice_no }}</td>
                                                <td>{{ $item->amount }} TL</td>
                                                <td>{{ $item->payment_method }}</td>
                                                <td>
                                                    <div class="font-size-13"><i
                                                            class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>{{ $item->status }}
                                                    </div>
                                                </td>




                                                <td>
                                                    <a href="{{ route('pending.order.details', $item->id) }}">
                                                        <button class="btn btn-primary btn-sm">
                                                            <i class="far fa-eye"></i>
                                                        </button>
                                                    </a>
                                                </td>

                                            </tr>
                                            <!-- end -->
                                        @endforeach
                                    </tbody><!-- end tbody -->
                                </table> <!-- end table -->
                            </div>
                        </div><!-- end card -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
        </div>

    </div>
@endsection
