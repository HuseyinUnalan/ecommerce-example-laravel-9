<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $order->invoice_no }} Fatura</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        .font {
            font-size: 15px;
        }

        .authority {
            /*text-align: center;*/
            float: right
        }

        .authority h5 {
            margin-top: -10px;
            color: green;
            /*text-align: center;*/
            margin-left: 35px;
        }

        .thanks p {
            color: green;
            ;
            font-size: 16px;
            font-weight: normal;
            font-family: serif;
            margin-top: 20px;
        }

        .td-center {
            text-align: center;
        }

        .td-right {
            text-align: right;
        }
    </style>

</head>

<body>

    <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
        <tr>
            <td valign="top">
                <!-- {{-- <img src="" alt="" width="150"/> --}} -->
                <h2 style="color: green; font-size: 26px;"><strong>Kolay Alisveris</strong></h2>
            </td>
            <td class="td-right">
                <pre class="font">
              Kolay Alisveris
               Email: kolay@gmail.com <br>
               Telefon: 555 555 55 55 <br>
                <br>
              
            </pre>
            </td>
        </tr>

    </table>


    <table width="100%" style="background:white; padding:2px;"></table>

    <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
        <tr>
            <td>
                <p class="font" style="margin-left: 20px;">
                    <strong>Ad Soyad:</strong> {{ $order->name }}<br>
                    <strong>Email:</strong> {{ $order->email }} <br>
                    <strong>Telefon:</strong> {{ $order->phone }} <br>
                    @php
                        $div = $order->division->division_name;
                        $dis = $order->district->districts_name;
                    @endphp
                    <strong>Adres:</strong> {{ $div }},{{ $dis }} <br>
                    <strong>Posta Kodu:</strong> {{ $order->post_code }}
                </p>
            </td>
            <td>
                <p class="font">
                <h3><span style="color: green;">Fatura:</span> #{{ $order->invoice_no }}</h3>
                Siparis Tarihi : {{ $order->order_date }} <br>
                Teslimat Tarihi : {{ $order->delivered_date }} <br>
                Ödeme Tipi : {{ $order->payment_method }} </span>
                </p>
            </td>
        </tr>
    </table>
    <br />
    <h3>Ürünler</h3>


    <table width="100%">
        <thead style="background-color: green; color:#FFFFFF;">
            <tr class="font">
                <th>Ürün Fotograf</th>
                <th>Ürün Ad</th>
                <th>Ürün Kod</th>
                <th>Adet</th>
                <th>Birim Fiyat </th>
                <th>Toplam Fiyat </th>
            </tr>
        </thead>
        <tbody>




            @foreach ($orderItem as $item)
                <tr class="font">
                    <td class="td-center">

                        <img src="{{ public_path($item->product->product_thambnail_photo) }}" height="60px;"
                            width="60px;" alt="">
                    </td>

                    <td class="td-center"> {{ $item->product->product_name }}</td>

                    <td class="td-center">{{ $item->product->product_code }}</td>
                    <td class="td-center">{{ $item->qty }}</td>
                    <td class="td-center">{{ $item->price }} TL</td>
                    <td class="td-center">{{ $item->price * $item->qty }} TL </td>
                </tr>
            @endforeach


        </tbody>
    </table>
    <br>
    <table width="100%" style=" padding:0 10px 0 10px;">
        <tr>
            <td class="td-right">
                <h2><span style="color: green;">Subtotal:</span> {{ $order->amount }} TL</h2>
                <h2><span style="color: green;">Total:</span> {{ $order->amount }} TL</h2>
                {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
            </td>
        </tr>
    </table>
    <div class="thanks mt-3">
        <p>Thanks For Buying Products..!!</p>
    </div>
    <div class="authority float-right mt-5">
        <p>-----------------------------------</p>
        <h5>Authority Signature:</h5>
    </div>
</body>

</html>
