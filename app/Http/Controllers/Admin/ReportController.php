<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function todayOrder(): Factory|View|Application
    {
        $today = date('d-m-y');
        $orders = DB::table('orders')->where('status', 0)->where('date', $today)->get();
        return view('admin.reports.today_order', compact('orders'));
    }

    public function todayDelivery(): Factory|View|Application
    {
        $today = date('d-m-y');
        $orders = DB::table('orders')->where('status', 3)->where('date', $today)->get();
        return view('admin.reports.today_delivery', compact('orders'));
    }

    public function thisMonth(): Factory|View|Application
    {
        $month = date('F');
        $orders = DB::table('orders')->where('status', 3)->where('month', $month)->get();
        return view('admin.reports.this_month', compact('orders'));
    }

    public function searchReport(): Factory|View|Application
    {;
        return view('admin.reports.search');
    }


    // CUSTROM SEARCH REPORT
    public function serachByYear(Request $request)
    {
        $year = $request->year;
        $total = DB::table('orders')->where('status', 3)->where('year', $year)->sum('total');
        $orders = DB::table('orders')->where('status', 3)->where('year', $year)->get();
        return view('admin.reports.search_by_year', compact('orders', 'total'));
    }

    public function serachByMonth(Request $request)
    {
        $month = $request->month;
        $total = DB::table('orders')->where('status', 3)->where('month', $month)->sum('total');
        $orders = DB::table('orders')->where('status', 3)->where('month', $month)->get();
        return view('admin.reports.search_by_month', compact('orders', 'total'));
    }

    public function serachByDate(Request $request)
    {
        $date = $request->date;
        $newDate = date('d-m-y', strtotime($date));
        $total = DB::table('orders')->where('status', 3)->where('date', $newDate)->sum('total');
        $orders = DB::table('orders')->where('status', 3)->where('date', $newDate)->get();
        return view('admin.reports.search_by_date', compact('orders', 'total'));
    }
}
