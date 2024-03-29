<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ !empty($adminData->profile_photo_path) ? url('upload/admin_images/' . $adminData->profile_photo_path) : url('upload/no_image.jpg') }}"
                    alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{ $adminData->name }}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                    Online</span>
            </div>
        </div>

        @php
            $product =
                auth()
                    ->guard('admin')
                    ->user()->product == 1;
            $slider =
                auth()
                    ->guard('admin')
                    ->user()->slider == 1;
            $coupon =
                auth()
                    ->guard('admin')
                    ->user()->coupon == 1;
            $shipping =
                auth()
                    ->guard('admin')
                    ->user()->shipping == 1;
            $orders =
                auth()
                    ->guard('admin')
                    ->user()->orders == 1;
            $reports =
                auth()
                    ->guard('admin')
                    ->user()->reports == 1;
            $alluser =
                auth()
                    ->guard('admin')
                    ->user()->alluser == 1;
            $settings =
                auth()
                    ->guard('admin')
                    ->user()->settings == 1;
            $returnorder =
                auth()
                    ->guard('admin')
                    ->user()->returnorder == 1;
            $reviews =
                auth()
                    ->guard('admin')
                    ->user()->reviews == 1;
            $adminuserrole =
                auth()
                    ->guard('admin')
                    ->user()->adminuserrole == 1;
        @endphp


        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ url('/admin/dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>


                @if ($product == true)
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-clipboard-list"></i>
                            <span>Ürün İşlemleri</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('add.product') }}">Ürün Ekle</a></li>
                            <li><a href="{{ route('all.product') }}">Ürün Listesi</a></li>
                            <li><a href="{{ route('add.product.category') }}">Ürün Kategori Ekle</a></li>
                            <li><a href="{{ route('all.product.category') }}">Ürün Kategori Listesi</a></li>
                        </ul>
                    </li>
                @endif


                @if ($slider == true)
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-layout-3-line"></i>
                            <span>Slider İşlemleri</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('add.slider') }}">Slider Ekle</a></li>
                            <li><a href="{{ route('all.slider') }}">Slider Listesi</a></li>
                        </ul>
                    </li>
                @endif


                @if ($coupon == true)
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-ticket-alt"></i>
                            <span>Kupon İşlemleri</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('add.coupon') }}">Kupon Ekle</a></li>
                            <li><a href="{{ route('all.coupon') }}">Kupon Listesi</a></li>
                        </ul>
                    </li>
                @endif


                @if ($shipping == true)
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-shipping-fast"></i>
                            <span>Kargo İşlemleri</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('add.shipping') }}">Bölge Ekle</a></li>
                            <li><a href="{{ route('all.shipping') }}">Bölge Listesi</a></li>
                            <li><a href="{{ route('add.shipping.district') }}">Nakliye Yönlendirme Ekle</a></li>
                            <li><a href="{{ route('all.shipping.district') }}">Nakliye Yönlendirme Listesi</a></li>

                        </ul>
                    </li>
                @endif


                @if ($orders == true)
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Sipariş İşlemleri</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('pending.orders') }}">Bekleyen Siparişler</a></li>
                            <li><a href="{{ route('confirmed.orders') }}">Onaylanmış Siparişler</a></li>
                            <li><a href="{{ route('processing.orders') }}">İşlemdeki Siparişler</a></li>
                            <li><a href="{{ route('picked.orders') }}">Hazırlanmış Siparişler</a></li>
                            <li><a href="{{ route('shipped.orders') }}">Kargodaki Siparişler</a></li>
                            <li><a href="{{ route('delivered.orders') }}">Teslim Edilen Siparişler</a></li>
                            <li><a href="{{ route('admin.cancel.orders') }}">İptal Edilen Siparişler</a></li>
                        </ul>
                    </li>
                @endif


                @if ($reports == true)
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-file-alt"></i>
                            <span>Rapor İşlemleri</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('all-reports') }}">Raporlar</a></li>
                        </ul>
                    </li>
                @endif


                @if ($alluser == true)
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-users"></i>
                            <span>Kullanıcılar</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('all-users') }}">Kullanıcılar</a></li>
                        </ul>
                    </li>
                @endif


                @if ($settings == true)
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-cog"></i>
                            <span>Genel Ayarlar</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('site.setting') }}">Site Ayarları</a></li>
                            <li><a href="{{ route('seo.setting') }}">SEO Ayarları</a></li>
                        </ul>
                    </li>
                @endif


                @if ($returnorder == true)
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-undo"></i>
                            <span>İade İşlemleri</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('return.request') }}">İade Talepleri</a></li>
                            <li><a href="{{ route('all.request') }}">İade Edilenler</a></li>
                        </ul>
                    </li>
                @endif


                @if ($reviews == true)
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="far fa-comment"></i>
                            <span>Yorum İşlemleri</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('all.review') }}">Gelen Yorumlar</a></li>
                        </ul>
                    </li>
                @endif


                @if ($adminuserrole == true)
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-user-cog"></i>
                            <span>Admin Kullanıcı Ayarları</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('all.admin.user') }}">Admin Kullanıcılar</a></li>
                        </ul>
                    </li>
                @endif









            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
