@if ($products->isEmpty())
<h5 class="text-center text-danger">Sonuç Bulunamadı.</h5> 
@else
    <ul class="list-group">
        @foreach ($products as $product)
            <a href="{{ url('product/details/' . $product->id . '/' . $product->product_slug) }}">
                <li class="list-group-item">
                    <div class="row">
                        <img src="{{ asset($product->product_thambnail_photo) }}" style="width: 45px; height: 45px;">
                        <p style="margin-top: 15px;">{{ $product->product_name }} / {{ $product->selling_price }} TL</p>
                    </div>
                </li>
            </a>
        @endforeach
    </ul>
@endif
