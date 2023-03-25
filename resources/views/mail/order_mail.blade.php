@extends('frontend.main_master')
@section('content')
    <ul class="form-control">
        <li> {{ $order['invoice_no'] }} </li>
        <li> {{ $order['amount'] }} </li>
        <li> {{ $order['name'] }} </li>
        <li> {{ $order['email'] }} </li>
    </ul>
@endsection
