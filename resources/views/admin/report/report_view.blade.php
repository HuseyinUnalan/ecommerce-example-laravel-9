@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">


            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Kupon Ekle</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Kupon İşlemleri</a></li>
                                <li class="breadcrumb-item active">Kupon Ekle</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Tarihe Göre Ara</h5>
                            <hr>
                            <form action="{{ route('search-by-date') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Tarih Seç</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="date" type="date" required>
                                    </div>
                                </div>
                                <!-- end row -->


                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Ara">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Aya Göre Ara</h5>
                            <hr>
                            <form action="{{ route('search-by-month') }}" method="POST">
                                @csrf

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Ay Seç</label>
                                    <div class="col-sm-10">
                                        <select name="month" class="form-control" id="">
                                            <option label="Seçin"></option>
                                            <option value="Ocak">Ocak</option>
                                            <option value="Şubat">Şubat</option>
                                            <option value="Mart">Mart</option>
                                            <option value="Nisan">Nisan</option>
                                            <option value="Mayıs">Mayıs</option>
                                            <option value="Haziran">Haziran</option>
                                            <option value="Temmuz">Temmuz</option>
                                            <option value="Ağustos">Ağustos</option>
                                            <option value="Eylül">Eylül</option>
                                            <option value="Ekim">Ekim</option>
                                            <option value="Kasım">Kasım</option>
                                            <option value="Aralık">Aralık</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Yıl Seç</label>
                                    <div class="col-sm-10">
                                        <select name="year_name" class="form-control" id="">
                                            <option label="Seçin"></option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->


                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Ara">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Yıla Göre Ara</h5>
                            <hr>
                            <form action="{{ route('search-by-year') }}" method="POST">
                                @csrf

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Yıl Seç</label>
                                    <div class="col-sm-10">
                                        <select name="year" class="form-control" id="">
                                            <option label="Seçin"></option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->


                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Ara">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end col -->



            </div>

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
