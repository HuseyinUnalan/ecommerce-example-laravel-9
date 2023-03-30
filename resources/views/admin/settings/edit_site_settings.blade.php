@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Genel Ayarlar</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Site Ayarları</a></li>
                                <li class="breadcrumb-item active">Genel Ayarlar</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <input type="hidden" name="id" value="{{ $settings->id }}">
                                <input type="hidden" name="old_logo" value="{{ $settings->logo }}">
                                <input type="hidden" name="old_favicon" value="{{ $settings->favicon }}">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-xl" style="width: 150px; height: auto;"
                                            src="{{ !empty($settings->logo) ? url($settings->logo) : url('upload/no_image.jpg') }}">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Logo</label>
                                    <div class="col-sm-10">
                                        <input id="image" name="logo" accept="image/png, image/gif, image/jpeg"
                                            class="form-control" type="file">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImageTwo" class="rounded avatar-xl" style="width: 150px; height: auto;"
                                            src="{{ !empty($settings->favicon) ? url($settings->favicon) : url('upload/no_image.jpg') }}">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Favicon</label>
                                    <div class="col-sm-10">
                                        <input id="imageTwo" name="favicon" accept="image/png, image/gif, image/jpeg"
                                            class="form-control" type="file">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Web Sitesi Adı
                                    </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="site_title" value="{{ $settings->site_title }}"
                                            type="text" required>
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Telefon</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="phone" value="{{ $settings->phone }}"
                                            type="text" required>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Whatsapp</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="whatsapp" value="{{ $settings->whatsapp }}"
                                            type="text" required>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="email" value="{{ $settings->email }}"
                                            type="text" required>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Adres</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="address" value="{{ $settings->address }}"
                                            type="text" required>
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="facebook" value="{{ $settings->facebook }}"
                                            type="text" required>
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Twitter</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="twitter" value="{{ $settings->twitter }}"
                                            type="text" required>
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Instagram</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="instagram" value="{{ $settings->instagram }}"
                                            type="text" required>
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Youtube</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="youtube" value="{{ $settings->youtube }}"
                                            type="text" required>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Linkedin</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="linkedin" value="{{ $settings->linkedin }}"
                                            type="text" required>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#imageTwo').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImageTwo').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
