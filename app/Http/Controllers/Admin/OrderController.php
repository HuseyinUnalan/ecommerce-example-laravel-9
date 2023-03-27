<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
}
