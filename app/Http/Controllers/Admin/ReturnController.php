<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function ReturnRequest()
    {
        $orders = Order::where('return_order', 1)->orderBy('id', 'DESC')->get();
        return view('admin.return_order.return_request', compact('orders'));
    }

    public function ReturnRequestApprove($order_id)
    {
        Order::where('id', $order_id)->update(['return_order' => 2]);

        $notification = array(
            'message' => 'Ürün Başarı İle İade Alındı.',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function ReturnAllRequest()
    {
        $orders = Order::where('return_order', 2)->orderBy('id', 'DESC')->get();
        return view('admin.return_order.all_return_request', compact('orders'));
    }
}
