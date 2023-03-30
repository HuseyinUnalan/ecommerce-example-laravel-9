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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">SEO Ayarları</a></li>
                                <li class="breadcrumb-item active">Genel Ayarlar</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <form action="{{ route('seo.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <input type="hidden" name="id" value="{{ $seo->id }}">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Meta Başlık
                                    </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="meta_title" value="{{ $seo->meta_title }}"
                                            type="text" required>
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Meta Anahtar
                                        Kelime</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="meta_keyword" value="{{ $seo->meta_keyword }}"
                                            type="text" required>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Meta Açıklama</label>
                                    <div class="col-sm-10">
                                        <textarea name="meta_description" class="form-control" id="" cols="30" rows="4">
                                          {{ $seo->meta_description }}
                                        </textarea>
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                  <label for="example-text-input" class="col-sm-2 col-form-label">Google Analytics</label>
                                  <div class="col-sm-10">
                                      <textarea name="google_analytics" class="form-control" id="" cols="30" rows="4">
                                        {{ $seo->google_analytics }}
                                      </textarea>
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
@endsection
