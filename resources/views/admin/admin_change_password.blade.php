@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Şifre Güncelle</h4>

                            <form method="POST" action="{{ route('admin.update.password') }}">
                                @csrf


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Eski Şifre</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="oldpassword" id="current_password"
                                            required>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Yeni Şifre</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Yeni Şifre
                                        Tekrar</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" required>
                                    </div>
                                </div>
                                <!-- end row -->




                                <hr>
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Şifre Güncelle">


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
