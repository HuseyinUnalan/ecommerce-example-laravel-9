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

            <form action="{{ route('update.product') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $products->id }}">
                <input type="hidden" name="old_image" value="{{ $products->product_thambnail_photo }}">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-xl"
                                            src="{{ !empty($products->product_thambnail_photo) ? url($products->product_thambnail_photo) : url('upload/no_image.jpg') }}"
                                            style="width: 200px; height: auto;">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Ürün Fotoğraf</label>
                                    <div class="col-sm-10">
                                        <input id="image" name="product_thambnail_photo" class="form-control"
                                            type="file">
                                    </div>
                                </div>
                                <!-- end row -->



                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Ürün Kategori</label>
                                    <div class="col-sm-10">
                                        <select name="category_id" class="form-select" aria-label="Default select example">
                                            @foreach ($productcategories as $productcategori)
                                                <option value="{{ $productcategori->id }}"
                                                    {{ $productcategori->id == $products->category_id ? 'selected' : '' }}>
                                                    {{ $productcategori->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Ürün Adı</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="product_name"
                                            value="{{ $products->product_name }}" type="text">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Ürün Etiket</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="product_tags" data-role="tagsinput"
                                            value="{{ $products->product_tags }}">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Satış Fiyatı</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="selling_price"
                                            value="{{ $products->selling_price }}" type="text">
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">İndirimli Satış
                                        Fiyatı</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="discount_price"
                                            value="{{ $products->discount_price }}" type="text">
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Ürün Açıklama</label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="product_description">{{ $products->product_description }}</textarea>
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Desk</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="desk" value="{{ $products->desk }}"
                                            type="number">
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Tavsiye Ürün</label>
                                    <div class="col-sm-1">
                                        <input type="checkbox" name="advice_product" id="square-switch1" switch="info"
                                            value="1" {{ $products->advice_product == 1 ? 'checked' : '' }} />
                                        <label for="square-switch1" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Yeni Ürün</label>
                                    <div class="col-sm-1">
                                        <input type="checkbox" name="new_product" id="square-switch2" switch="info"
                                            value="1" {{ $products->new_product == 1 ? 'checked' : '' }} />
                                        <label for="square-switch2" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Trend Ürün</label>
                                    <div class="col-sm-1">
                                        <input type="checkbox" name="trend_product" id="square-switch3" switch="info"
                                            value="1" {{ $products->trend_product == 1 ? 'checked' : '' }} />
                                        <label for="square-switch3" data-on-label="Yes" data-off-label="No"></label>
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
