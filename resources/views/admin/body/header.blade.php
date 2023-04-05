<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ url('/admin/dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('backend/images/logo-sm.png') }}" alt="logo-sm" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="logo-dark" height="20">
                    </span>
                </a>

                <a href="{{ url('/admin/dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('backend/images/logo-sm.png') }}" alt="logo-sm-light" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('backend/images/logo-light.png') }}" alt="logo-light" height="20">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>




        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-search-line"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="mb-3 m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="ri-search-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>

            @php
                $pendings = App\Models\Order::where('status', 'Pending')->get();
                
                $orders =
                    auth()
                        ->guard('admin')
                        ->user()->orders == 1;
            @endphp

            @if ($orders == true)
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                        id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ri-notification-3-line"></i>
                        <span class="noti-dot"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0"> {{ count($pendings) }} Onay Bekleyen Sipariş </h6>
                                </div>
                                {{-- <div class="col-auto">
                                <a href="#!" class="small"> View All</a>
                            </div> --}}
                            </div>
                        </div>


                        <div data-simplebar style="max-height: 230px;">


                            @foreach ($pendings as $pending)
                                <a href="{{ route('pending.order.details', $pending->id) }}"
                                    class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="flex-1">
                                            <h4>{{ $pending->invoice_no }}</h4>
                                            <h6 class="mb-1">{{ $pending->name }}</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">{{ $pending->amount }} TL</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i>
                                                    {{ $pending->order_date }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach

                        </div>

                        <div class="p-2 border-top">
                            <div class="d-grid">
                                <a class="btn btn-sm btn-link font-size-14 text-center"
                                    href="{{ route('pending.orders') }}">
                                    <i class="mdi mdi-arrow-right-circle me-1"></i> Daha Fazla..
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            @endif

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{ !empty($adminData->profile_photo_path) ? url('upload/admin_images/' . $adminData->profile_photo_path) : url('upload/no_image.jpg') }}"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">{{ $adminData->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('admin.profile.edit') }}"><i
                            class="ri-user-line align-middle me-1"></i>
                        Profile</a>
                    <a class="dropdown-item" href="{{ route('admin.change.password') }}"><i
                            class="ri-wallet-2-line align-middle me-1"></i> Şifre Değiştir</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"><i
                            class="ri-shut-down-line align-middle me-1 text-danger"></i> Çıkış Yap</a>
                </div>
            </div>



        </div>
    </div>
</header>
