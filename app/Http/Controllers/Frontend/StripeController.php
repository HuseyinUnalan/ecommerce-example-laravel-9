<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class StripeController extends Controller
{
    public function StripeOrder(Request $request)
    {

        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        } else {
            $total_amount = round(Cart::total());
        }

        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51Mko1CCNaHyzAJJLN13xEOvCpao8BWcu3FjSSsdznqs7UArDEAZcp3Yayj7fMPSoAK3b9BKZEFnfg7Giv5eQ2IBM00YsJmO32w');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $total_amount * 100,
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);
        // dd($charge);


        $aylar = array(
            'January'    =>    'Ocak',
            'February'    =>    'Şubat',
            'March'        =>    'Mart',
            'April'        =>    'Nisan',
            'May'        =>    'Mayıs',
            'June'        =>    'Haziran',
            'July'        =>    'Temmuz',
            'August'    =>    'Ağustos',
            'September'    =>    'Eylül',
            'October'    =>    'Ekim',
            'November'    =>    'Kasım',
            'December'    =>    'Aralık',
            'Monday'    =>    'Pazartesi',
            'Tuesday'    =>    'Salı',
            'Wednesday'    =>    'Çarşamba',
            'Thursday'    =>    'Perşembe',
            'Friday'    =>    'Cuma',
            'Saturday'    =>    'Cumartesi',
            'Sunday'    =>    'Pazar',
            'Jan' => 'Oca',
            'Feb' => 'Şub',
            'Mar' => 'Mar',
            'Apr' => 'Nis',
            'May' => 'May',
            'Jun' => 'Haz',
            'Jul' => 'Tem',
            'Aug' => 'Ağu',
            'Sep' => 'Eyl',
            'Oct' => 'Eki',
            'Nov' => 'Kas',
            'Dec' => 'Ara'

        );
        

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'payment_type' => 'Stripe',
            'payment_method' => 'Stripe',
            'payment_type' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,

            'invoice_no' => 'EOS' . mt_rand(10000000, 99999999),
            'order_date' =>  strtr(Carbon::now()->format('d F Y'), $aylar),
            'order_month' => strtr(Carbon::now()->format('F'), $aylar),
            'order_year' =>  Carbon::now()->format('Y'),
            'status' => 'Pending',
            'created_at' => Carbon::now(),

        ]);


        //Start Send Email
        // $invoice = Order::findOrFail($order_id);
        // $data = [
        //     'invoice_no' => $invoice->invoice_no,
        //     'amount' => $total_amount,
        //     'name' => $invoice->name,
        //     'email' => $invoice->email,
        // ];
        // Mail::to($request->email)->send(new OrderMail($data));
        //Start Send Email


        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),

            ]);
        }
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Sipariş Başarı İle Verildi.',
            'alert-type' => 'success'
        );

        return redirect()->route('/')->with($notification);
    }
}
