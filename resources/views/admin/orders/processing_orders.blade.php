@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">İşlemdeki Siparişler</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Sipariş İşlemleri </a></li>
                                <li class="breadcrumb-item active">İşlemdeki Siparişler</li>
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
                                                    <th>Tarih</th>
                                                    <th>Fatura</th>
                                                    <th>Tutar</th>
                                                    <th>Ödeme Türü</th>
                                                    <th>Durum</th>
                                                    <th>İşlemler</th>
                                                </tr>
                                            </thead>


                                            <tbody>

                                                @php($i = 1)

                                                @foreach ($orders as $item)
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
