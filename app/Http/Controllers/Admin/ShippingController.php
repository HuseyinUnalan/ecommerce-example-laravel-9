<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ShippingController extends Controller
{
    public function AllShipping()
    {
        $divisions = Shipping::orderBy('id', 'DESC')->get();
        return view('admin.ship.division.all_division', compact('divisions'));
    }

    public function AddShipping()
    {
        return view('admin.ship.division.add_division');
    }

    public function StoreShipping(Request $request)
    {

        Shipping::insert([

            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Bölüm Eklendi',
            'alert-type' => 'success'
        );

        return redirect()->route('all.shipping')->with($notification);
    }

    public function EditShipping($id)
    {
        $division = Shipping::findOrFail($id);
        return view('admin.ship.division.edit_division', compact('division'));
    }

    public function UpdateShipping(Request $request)
    {
        $shipping_id = $request->id;

        Shipping::findOrFail($shipping_id)->update([

            'division_name' => $request->division_name,
        ]);

        $notification = array(
            'message' => 'Bölüm Güncellendi',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteShipping($id)
    {

        Shipping::findOrFail($id)->delete();


        $notification = array(
            'message' => 'Bölüm Başarı İle Silindi',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }


    // -------- For Shipping District --------
    public function AllShippingDistrict()
    {
        $districts = ShipDistrict::with('division')->orderBy('id', 'DESC')->get();
        return view('admin.ship.district.all_district', compact('districts'));
    }

    public function AddShippingDistrict()
    {
        $divisions = Shipping::orderBy('division_name', 'ASC')->get();
        return view('admin.ship.district.add_district', compact('divisions'));
    }

    public function StoreShippingDistrict(Request $request)
    {

        ShipDistrict::insert([

            'districts_name' => $request->districts_name,
            'division_id' => $request->division_id,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Bölüm Eklendi',
            'alert-type' => 'success'
        );

        return redirect()->route('all.shipping.district')->with($notification);
    }

    public function EditShippingDistrict($id)
    {
        $districts = ShipDistrict::findOrFail($id);
        $divisions = Shipping::latest()->get();
        return view('admin.ship.district.edit_district', compact('districts', 'divisions'));
    }

    public function UpdateShippingDistrict(Request $request)
    {
        $districts_id = $request->id;

        ShipDistrict::findOrFail($districts_id)->update([

            'districts_name' => $request->districts_name,
            'division_id' => $request->division_id,
        ]);

        $notification = array(
            'message' => 'Bölüm Güncellendi',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteShippingDistrict($id)
    {

        ShipDistrict::findOrFail($id)->delete();


        $notification = array(
            'message' => 'Bölüm Başarı İle Silindi',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
