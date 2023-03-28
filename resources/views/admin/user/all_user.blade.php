@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Kullanıcılar</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Kullanıcılar </a></li>
                                <li class="breadcrumb-item active">Kullanıcılar</li>
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
                                    <div class="col-sm-12">
                                        <table id="datatable"
                                            class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                            style="border-collapse: collapse; border-spacing: 0px; width: 100%;"
                                            role="grid" aria-describedby="datatable_info">
                                            <span>Toplam Kullanıcı Sayısı : {{ count($users) }} </span>
                                            <hr>
                                            <thead>
                                                <tr role="row">
                                                    <th>#</th>
                                                    <th>Fotoğraf</th>
                                                    <th>Ad Soyad</th>
                                                    <th>Email</th>
                                                    <th>Kayıt Tarihi</th>
                                                    <th>Durum</th>
                                                    <th>İşlemler</th>
                                                </tr>
                                            </thead>


                                            <tbody>

                                                @php($i = 1)

                                                @foreach ($users as $user)
                                                    <tr class="odd">
                                                        <td>{{ $i++ }}</td>
                                                        <td><img src="{{ !empty($user->profile_photo_path) ? url('storage/' . $user->profile_photo_path) : url('upload/no_image.jpg') }}"
                                                                style="width: 50px; height: 50px;"> </td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>

                                                        <td>
                                                            {{ strtr(Carbon\Carbon::parse($user->created_at)->format('D, d F Y'), $aylar) }}
                                                        </td>
                                                        <td>
                                                            @if ($user->UserOnline())
                                                                <div class="font-size-13"><i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Aktif
                                                                </div>
                                                            @else
                                                                <div class="font-size-13"><i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-danger align-middle me-2"></i>Aktif
                                                                    Değil
                                                                    <br><br>
                                                                    Son Giriş :
                                                                    {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                                                                </div>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('edit.coupon', $user->id) }}">
                                                                <button class="btn btn-primary btn-sm">
                                                                    <i class="far fa-edit"></i>
                                                                </button>
                                                            </a>

                                                            <a href="{{ route('delete.coupon', $user->id) }}"
                                                                id="delete">
                                                                <button class="btn btn-danger btn-sm">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </a>


                                                            @if ($user->status == 1)
                                                                <a href="{{ route('coupon.inactive', $user->id) }}"
                                                                    class="btn btn-danger btn-sm"><i
                                                                        class="fa fa-arrow-down"
                                                                        title="Inactive Now"></i></a>
                                                            @else
                                                                <a href="{{ route('coupon.active', $user->id) }}"
                                                                    class="btn btn-success btn-sm"><i class="fa fa-arrow-up"
                                                                        title="Active Now"></i></a>
                                                            @endif

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
