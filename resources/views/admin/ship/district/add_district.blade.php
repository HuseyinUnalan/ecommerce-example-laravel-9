@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Nakliye Yönlendirme Ekle</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Nakliye Yönlendirme İşlemleri</a></li>
                                <li class="breadcrumb-item active">Nakliye Yönlendirme Ekle</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <form action="{{ route('store.shipping.district') }}" method="POST" enctype="multipart/form-data">
                @csrf



                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">




                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Başlık</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="districts_name" type="text" required>
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                  <label class="col-sm-2 col-form-label">Bölüm Seç</label>
                                  <div class="col-sm-10">
                                      <select name="division_id" class="form-select" aria-label="Default select example" required>
                                          @foreach ($divisions as $division)
                                              <option value="{{ $division->id }}">
                                                  {{ $division->division_name }}
                                              </option>
                                          @endforeach
                                      </select>
                                  </div>
                              </div>
                              <!-- end row -->






                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Ekle">

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
