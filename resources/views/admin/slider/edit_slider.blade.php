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

            <form action="{{ route('update.slider') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $sliders->id }}">
                <input type="hidden" name="old_image" value="{{ $sliders->photo }}">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-xl"
                                            src="{{ !empty($sliders->photo) ? url($sliders->photo) : url('upload/no_image.jpg') }}"
                                            style="width: 200px; height: auto;">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Slider Fotoğraf</label>
                                    <div class="col-sm-10">
                                        <input id="image" name="photo" class="form-control" type="file">
                                    </div>
                                </div>
                                <!-- end row -->





                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Başlık</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="title" value="{{ $sliders->title }}"
                                            type="text">
                                    </div>
                                </div>
                                <!-- end row -->



                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Ürün Link</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="link" value="{{ $sliders->link }}"
                                            type="text">
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Satış Fiyatı</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="selling_price"
                                            value="{{ $sliders->selling_price }}" type="text">
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">İndirimli Satış
                                        Fiyatı</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="discount_price"
                                            value="{{ $sliders->discount_price }}" type="text">
                                    </div>
                                </div>
                                <!-- end row -->





                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Tür</label>
                                    <div class="col-sm-10">
                                        <select name="type" class="form-select" aria-label="Default select example">

                                            <option value="{{ $sliders->type }}" selected>{{ $sliders->type }}</option>
                                            <option value="İndirimli Ürün">İndirimli Ürün</option>
                                            <option value="Yeni Ürün">Yeni Ürün</option>

                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Desk</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="desk" value="{{ $sliders->desk }}"
                                            type="number">
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
