@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Gelen Yorumlar</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Yorum İşlemleri </a></li>
                                <li class="breadcrumb-item active">Gelen Yorumlar</li>
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
                                            <thead>
                                                <tr role="row">
                                                    <th>#</th>
                                                    <th>Ürün</th>
                                                    <th>Yazan Kullanıcı</th>
                                                    <th>Tarih</th>
                                                    <th>Özet</th>
                                                    <th>Yorum</th>
                                                    <th>Yorum Durum</th>
                                                    <th>İşlemler</th>
                                                </tr>
                                            </thead>


                                            <tbody>

                                                @php($i = 1)

                                                @foreach ($reviews as $item)
                                                    <tr class="odd">
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $item->product->product_name }}</td>
                                                        <td>{{ $item->user->name }}</td>
                                                        <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                        </td>
                                                        <td>{{ $item->summary }}</td>
                                                        <td>{{ $item->comment }}</td>

                                                        <td>
                                                            @if ($item->status == 1)
                                                                <div class="font-size-13"><i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-info align-middle me-2"></i>Yorum
                                                                    Aktif
                                                                </div>
                                                            @elseif ($item->return_order == 0)
                                                                <div class="font-size-13"><i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-danger align-middle me-2"></i>Yorum
                                                                    Onay Bekliyor
                                                                </div>
                                                            @endif
                                                        </td>




                                                        <td>

                                                            <a href="{{ route('review.approve', $item->id) }}">
                                                                <button class="btn btn-primary btn-sm">
                                                                    Onayla
                                                                </button>
                                                            </a>

                                                            <a href="{{ route('delete.review', $item->id) }}"
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
