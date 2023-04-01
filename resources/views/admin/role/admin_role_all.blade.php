@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Admin Kullanıcılar</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin Kullanıcı Ayarları </a></li>
                                <li class="breadcrumb-item active">Admin Kullanıcılar</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <a href="{{ route('add.admin') }}" class="btn btn-danger" style="float: right;">Admin Ekle</a>
            <br><br>
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">



                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable"
                                            class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                            style="border-collapse: collapse; border-spacing: 0px; width: 100%;"
                                            role="grid" aria-describedby="datatable_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>#</th>
                                                    <th>Fotoğraf</th>
                                                    <th>Ad Soyad</th>
                                                    <th>Email</th>
                                                    <th>Telefon</th>
                                                    <th>Yetki</th>
                                                    <th>İşlemler</th>
                                                </tr>
                                            </thead>


                                            <tbody>

                                                @php($i = 1)

                                                @foreach ($adminuser as $item)
                                                    <tr class="odd">
                                                        <td>{{ $i++ }}</td>

                                                        <td>
                                                            <img src="{{ asset('upload/admin_images/' . $item->profile_photo_path) }}"
                                                                alt="" style="width: 50px; height: 50px;">
                                                        </td>

                                                        <td>{{ $item->name }}</td>

                                                        <td>{{ $item->email }} </td>

                                                        <td>{{ $item->phone }} </td>


                                                        <td>
                                                            @if ($item->product == 1)
                                                                <div class="font-size-13"><i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Ürün
                                                                    İşlemleri
                                                                </div>
                                                            @else
                                                            @endif

                                                            @if ($item->slider == 1)
                                                                <div class="font-size-13"><i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Slider
                                                                    İşlemleri
                                                                </div>
                                                            @else
                                                            @endif

                                                            @if ($item->coupon == 1)
                                                                <div class="font-size-13"><i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Kupon
                                                                    İşlemleri
                                                                </div>
                                                            @else
                                                            @endif

                                                            @if ($item->shipping == 1)
                                                                <div class="font-size-13"><i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Kargo
                                                                    İşlemleri
                                                                </div>
                                                            @else
                                                            @endif

                                                            @if ($item->orders == 1)
                                                                <div class="font-size-13"><i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Sipariş
                                                                    İşlemleri
                                                                </div>
                                                            @else
                                                            @endif

                                                            @if ($item->reports == 1)
                                                                <div class="font-size-13"><i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Rapor
                                                                    İşlemleri
                                                                </div>
                                                            @else
                                                            @endif

                                                            @if ($item->alluser == 1)
                                                                <div class="font-size-13"><i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Kullanıcılar
                                                                </div>
                                                            @else
                                                            @endif

                                                            @if ($item->settings == 1)
                                                                <div class="font-size-13"><i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Genel
                                                                    Ayarlar
                                                                </div>
                                                            @else
                                                            @endif


                                                            @if ($item->returnorder == 1)
                                                                <div class="font-size-13"><i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>İade
                                                                    İşlemleri
                                                                </div>
                                                            @else
                                                            @endif


                                                            @if ($item->reviews == 1)
                                                                <div class="font-size-13"><i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Yorum
                                                                    İşlemleri
                                                                </div>
                                                            @else
                                                            @endif


                                                            @if ($item->adminuserrole == 1)
                                                                <div class="font-size-13"><i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Admin
                                                                    Kullanıcı Ayarları
                                                                </div>
                                                            @else
                                                            @endif



                                                        </td>



                                                        <td>
                                                            <a href="{{ route('edit.admin.user', $item->id) }}">
                                                                <button class="btn btn-primary btn-sm">
                                                                    <i class="far fa-edit"></i>
                                                                </button>
                                                            </a>

                                                            <a href="{{ route('delete.admin.user', $item->id) }}"
                                                                id="delete">
                                                                <button class="btn btn-danger btn-sm">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </a>
                                                        </td>

                                                    </tr>
                                                @endforeach





                                            </tbody>
                                        </table>
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
