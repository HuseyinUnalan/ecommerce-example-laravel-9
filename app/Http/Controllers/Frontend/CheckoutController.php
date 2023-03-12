<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function DistrictGetAjax($division_id)
    {
        $ships = ShipDistrict::where('division_id', $division_id)->orderBy('districts_name', 'ASC')->get();
        return json_encode($ships);
    }

    public function CheckoutStore(Request $request)
    {
        // dd($request->all());
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['notes'] = $request->notes;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;

        if ($request->payment_method == 'stripe') {
            return view('frontend.payment.stripe', compact('data'));
        } else if ($request->payment_method == 'card') {
            return 'card';
        } else {
            return 'cash';
        }
    }
}
