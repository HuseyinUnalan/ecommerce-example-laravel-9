@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Admin Kullanıcı Düzenle</h4>

                            <form action="{{ route('admin.user.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $adminuser->id }}">
                                <input type="hidden" name="old_image" value="{{ $adminuser->profile_photo_path }}">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-xl"
                                            src="{{ !empty($adminuser->profile_photo_path) ? url($adminuser->profile_photo_path) : url('upload/no_image.jpg') }}">
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Profil Resmi</label>
                                    <div class="col-sm-10">
                                        <input id="image" name="profile_photo_path" class="form-control" type="file"
                                            id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Ad Soyad</label>
                                    <div class="col-sm-10">
                                        <input name="name" class="form-control" type="text"
                                            value="{{ $adminuser->name }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">E-mail</label>
                                    <div class="col-sm-10">
                                        <input name="email" class="form-control" type="text"
                                            value="{{ $adminuser->email }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Telefon</label>
                                    <div class="col-sm-10">
                                        <input name="phone" class="form-control" type="text"
                                            value="{{ $adminuser->phone }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->





                                <hr>


                                <hr>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">

                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" class="form-check-input" id="checkbox_2"
                                                        name="product" value="1"
                                                        {{ $adminuser->product == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_2">Ürün İşlemleri</label>
                                                </fieldset>

                                                <fieldset>
                                                    <input type="checkbox" class="form-check-input" id="checkbox_3"
                                                        name="slider" value="1"
                                                        {{ $adminuser->slider == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_3">Slider İşlemleri</label>
                                                </fieldset>

                                                <fieldset>
                                                    <input type="checkbox" class="form-check-input" id="checkbox_13"
                                                        name="coupon" value="1"
                                                        {{ $adminuser->coupon == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_13">Kupon İşlemleri</label>
                                                </fieldset>

                                                <fieldset>
                                                    <input type="checkbox" class="form-check-input" id="checkbox_14"
                                                        name="shipping" value="1"
                                                        {{ $adminuser->shipping == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_14">Kargo İşlemleri</label>
                                                </fieldset>


                                                <fieldset>
                                                    <input type="checkbox" class="form-check-input" id="checkbox_15"
                                                        name="orders" value="1"
                                                        {{ $adminuser->orders == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_15">Sipariş İşlemleri</label>
                                                </fieldset>



                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-4">
                                        <div class="form-group">

                                            <div class="controls">



                                                <fieldset>
                                                    <input type="checkbox" class="form-check-input" id="checkbox_4"
                                                        name="reports" value="1"
                                                        {{ $adminuser->reports == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_4">Rapor İşlemleri</label>
                                                </fieldset>

                                                <fieldset>
                                                    <input type="checkbox" class="form-check-input" id="checkbox_5"
                                                        name="alluser" value="1"
                                                        {{ $adminuser->alluser == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_5">Kullanıcılar</label>
                                                </fieldset>

                                                <fieldset>
                                                    <input type="checkbox" class="form-check-input" id="checkbox_9"
                                                        name="settings" value="1"
                                                        {{ $adminuser->settings == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_9">Genel Ayarlar</label>
                                                </fieldset>


                                                <fieldset>
                                                    <input type="checkbox" class="form-check-input" id="checkbox_10"
                                                        name="returnorder" value="1"
                                                        {{ $adminuser->returnorder == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_10">İade İşlemleri</label>
                                                </fieldset>

                                                <fieldset>
                                                    <input type="checkbox" class="form-check-input" id="checkbox_11"
                                                        name="reviews" value="1"
                                                        {{ $adminuser->reviews == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_11"> Yorum İşlemleri</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="col-md-4">
                                        <div class="form-group">

                                            <div class="controls">

                                                <fieldset>
                                                    <input type="checkbox" class="form-check-input" id="checkbox_12"
                                                        name="adminuserrole" value="1"
                                                        {{ $adminuser->adminuserrole == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_12">Admin Kullanıcı Ayarları</label>
                                                </fieldset>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>


                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Düzenle">


                            </form>







                        </div>
                    </div>



                </div> <!-- end col -->



            </div>
            <!-- end row -->



        </div>
    </div>

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
