<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PDF;

class AllUserController extends Controller
{
    public function MyOrders()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view('frontend.user.order.order_view', compact('orders'));
    }

    public function OrderDetails($order_id)
    {
        $order = Order::with('division', 'district', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('frontend.user.order.order_details', compact('order', 'orderItem'));
    }

    public function InvoiceDownload($order_id)
    {
        $order = Order::with('division', 'district', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        // return view('frontend.user.order.order_invoice', compact('order', 'orderItem'));
        $pdf = PDF::loadView('frontend.user.order.order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }

    public function ReturnOrder(Request $request, $order_id)
    {
        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,
        ]);

        $notification = array(
            'message' => 'Başarı İle İade Gerçekleşti.',
            'alert-type' => 'info'
        );
        return redirect()->route('my.orders')->with($notification);
    }

    public function ReturnOrderList()
    {
        $orders = Order::where('user_id', Auth::id())->where('return_reason', '!=', NULL)->orderBy('id', 'DESC')->get();
        return view('frontend.user.order.return_order_view', compact('orders'));
    }

    public function CancelOrders()
    {
        $orders = Order::where('user_id', Auth::id())->where('status', 'Cancel')->orderBy('id', 'DESC')->get();
        return view('frontend.user.order.cancel_order_view', compact('orders'));
    }

    public function OrderTracking(Request $request)
    {
        $invoice = $request->code;

        $track = Order::where('invoice_no', $invoice)->first();

        if ($track) {
            //    echo "<pre>";
            //    print_r($track);
            return view('frontend.tracking.track_order', compact('track'));
        } else {
            $notification = array(
                'message' => 'Fatura No Bulunamadı.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
