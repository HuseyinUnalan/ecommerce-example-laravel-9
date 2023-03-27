<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class OrderController extends Controller
{
    public function PendingOrders()
    {
        $orders = Order::where('status', 'Pending')->orderBy('id', 'DESC')->get();
        return view('admin.orders.pending_orders', compact('orders'));
    }

    public function PendingOrderDetails($order_id)
    {
        $order = Order::with('division', 'district', 'user')->where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('admin.orders.pending_orders_details', compact('order', 'orderItem'));
    }

    public function ConfirmedOrders()
    {
        $orders = Order::where('status', 'Confirmed')->orderBy('id', 'DESC')->get();
        return view('admin.orders.confirmed_orders', compact('orders'));
    }

    public function ProcessingOrders()
    {
        $orders = Order::where('status', 'Processing')->orderBy('id', 'DESC')->get();
        return view('admin.orders.processing_orders', compact('orders'));
    }

    public function PickedOrders()
    {
        $orders = Order::where('status', 'Picked')->orderBy('id', 'DESC')->get();
        return view('admin.orders.picked_orders', compact('orders'));
    }

    public function ShippedOrders()
    {
        $orders = Order::where('status', 'Shipped')->orderBy('id', 'DESC')->get();
        return view('admin.orders.shipped_orders', compact('orders'));
    }

    public function DeliveredOrders()
    {
        $orders = Order::where('status', 'Delivered')->orderBy('id', 'DESC')->get();
        return view('admin.orders.delivered_orders', compact('orders'));
    }

    public function CancelOrders()
    {
        $orders = Order::where('status', 'Cancel')->orderBy('id', 'DESC')->get();
        return view('admin.orders.cancel_orders', compact('orders'));
    }

    public function PendingToConfirm($order_id)
    {
        Order::findOrFail($order_id)->update([
            'status' => 'Confirmed',
        ]);

        $notification = array(
            'message' => 'Sipariş Onaylandı.',
            'alert-type' => 'success'
        );
        return redirect()->route('pending.orders')->with($notification);
    }

    public function ConfirmToProcessing($order_id)
    {
        Order::findOrFail($order_id)->update([
            'status' => 'Processing',
        ]);

        $notification = array(
            'message' => 'Sipariş İşleme Alındı.',
            'alert-type' => 'success'
        );
        return redirect()->route('confirmed.orders')->with($notification);
    }

    public function ProcessingToPicked($order_id)
    {
        Order::findOrFail($order_id)->update([
            'status' => 'Picked',
        ]);

        $notification = array(
            'message' => 'Sipariş Hazırlanmış Siparişlere Alındı.',
            'alert-type' => 'success'
        );
        return redirect()->route('processing.orders')->with($notification);
    }

    public function PickedToShipped($order_id)
    {

        Order::findOrFail($order_id)->update([
            'status' => 'Shipped',
        ]);

        $notification = array(
            'message' => 'Sipariş Kargoya Verildi.',
            'alert-type' => 'success'
        );

        return redirect()->route('picked.orders')->with($notification);
    }


    public function ShippedToDelivered($order_id)
    {

        Order::findOrFail($order_id)->update([
            'status' => 'Delivered',
        ]);

        $notification = array(
            'message' => 'Sipariş Teslim Edildi.',
            'alert-type' => 'success'
        );

        return redirect()->route('shipped.orders')->with($notification);
    }

    public function AdminInvoiceDownload($order_id)
    {
        $order = Order::with('division', 'district', 'user')->where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        // return view('frontend.user.order.order_invoice', compact('order', 'orderItem'));
        $pdf = PDF::loadView('admin.orders.order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }
}
