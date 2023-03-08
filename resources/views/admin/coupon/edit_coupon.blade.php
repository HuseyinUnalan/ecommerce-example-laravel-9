@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Blog</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Blog List</a></li>
                                <li class="breadcrumb-item active">Edit Blog</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <form action="{{ route('update.coupon') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $coupons->id }}">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">




                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Kupon Adı</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="coupon_name" value="{{ $coupons->coupon_name }}"
                                            type="text">
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">İndirim Tutarı
                                        (%)</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="coupon_discount"
                                            value="{{ $coupons->coupon_discount }}" type="text">
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Geçerlilik
                                        Tarihi</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="coupon_validity"
                                            value="{{ $coupons->coupon_validity }}" type="date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                    </div>
                                </div>
                                <!-- end row -->





                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Güncelle">

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </form>



        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
