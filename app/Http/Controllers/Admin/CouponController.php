<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function AllCoupon()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        return view('admin.coupon.all_coupon', compact('coupons'));
    }

    public function AddCoupon()
    {
        return view('admin.coupon.add_coupon');
    }

    public function StoreCoupon(Request $request)
    {

        Coupon::insert([

            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Kupon Eklendi',
            'alert-type' => 'success'
        );

        return redirect()->route('all.coupon')->with($notification);
    }

    public function EditCoupon($id)
    {
        $coupons = Coupon::findOrFail($id);
        return view('admin.coupon.edit_coupon', compact('coupons'));
    }

    public function UpdateCoupon(Request $request)
    {
        $coupon_id = $request->id;

        Coupon::findOrFail($coupon_id)->update([

            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Kupon Güncellendi',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function CouponInactive($id)
    {
        Coupon::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Kupon Yayından Kaldırıldı.',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function CouponActive($id)
    {
        Coupon::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Kupon Yayına Alındı.',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function DeleteCoupon($id)
    {

        Coupon::findOrFail($id)->delete();


        $notification = array(
            'message' => 'Kupon Başarı İle Silindi',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
