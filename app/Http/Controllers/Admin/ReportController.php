<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function ReportView()
    {
        return view('admin.report.report_view');
    }

    public function ReportByDate(Request $request)
    {
        // return $request->all();

        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');
        // return $formatDate;

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
        // dd(strtr($formatDate, $aylar));
        // return  strtr($formatDate, $aylar);
        $orders = Order::where('order_date', strtr($formatDate, $aylar))->latest()->get();
        return view('admin.report.report_show', compact('orders'));
    }

    public function ReportByMonth(Request $request)
    {
        $orders = Order::where('order_month', $request->month)
            ->where('order_year', $request->year_name)
            ->latest()->get();
        return view('admin.report.report_show', compact('orders'));
    }

    public function ReportByYear(Request $request)
    {
        $orders = Order::where('order_year', $request->year)->latest()->get();
        return view('admin.report.report_show', compact('orders'));
    }
}
