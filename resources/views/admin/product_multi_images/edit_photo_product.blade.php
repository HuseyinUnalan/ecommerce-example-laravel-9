@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">

                @foreach ($products as $product)
                    <div class="col-md-6 col-xl-3">

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    @if ($product->status == 1)
                                        <div class="font-size-13"><i
                                                class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Yayında
                                        </div>
                                    @else
                                        <div class="font-size-13"><i
                                                class="ri-checkbox-blank-circle-fill font-size-10 text-danger align-middle me-2"></i>Yayında
                                            Değil
                                        </div>
                                    @endif
                                </h4>
                            </div>
                            <img class="img-fluid" src="{{ asset($product->photo) }}" alt="Card image cap">
                            <div class="card-body">


                                @if ($product->status == 1)
                                    <a href="{{ route('product.photo.inactive', $product->id) }}"
                                        class="btn btn-danger btn-sm"><i class="fa fa-arrow-down"
                                            title="Inactive Now"></i></a>
                                @else
                                    <a href="{{ route('product.photo.active', $product->id) }}"
                                        class="btn btn-success btn-sm"><i class="fa fa-arrow-up" title="Active Now"></i></a>
                                @endif

                                <a href="{{ route('delete.photo.product', $product->id) }}" class="card-link"
                                    id="delete">
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </a>
                            </div>
                        </div>

                    </div><!-- end col -->
                @endforeach

            </div>
            <!-- end row -->
        </div>
    </div>
@endsection
