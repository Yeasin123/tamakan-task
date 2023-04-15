<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderReportController extends Controller
{
    public function todayOrder()
    {
        $day = date('d-m-y');
        $order = Order::where('status',0)->where('day',$day)->get();
        return view('backend.pages.report.todayorder',compact('order'));
    }

    public function thisMonthOrder()
    {
        $month = date('F');
        $order = Order::orderBy('id','desc')->where('month',$month)->get();
        return view('backend.pages.report.thismonthorder',compact('order'));
    }

    public function thisYearOrder()
    {
        $year = date('Y');
        $order = Order::orderBy('id','desc')->where('year',$year)->get();
        return view('backend.pages.report.thisyearorder',compact('order'));
    }

    public function allDeliveryOrder()
    {
        $order = Order::orderBy('id','desc')->where('status',3)->get();
        return view('backend.pages.report.thisyearorder',compact('order'));
    }

    public function allCancleOrder()
    {
        $order = Order::orderBy('id','desc')->where('status',4)->get();
        return view('backend.pages.report.allcancledorder',compact('order'));
    }

    public function reportSearchOrder()
    {
        return view('backend.pages.report.searchreport');
    }

    public function searchByDay(Request $request)
    {
        $day = $request->day;
        $newdate = date('d-m-y',strtotime($day));
        $total = Order::orderBy('id','desc')->where('status',3)->where('day',$newdate)->sum('total');
        $order = Order::orderBy('id','desc')->where('status',3)->where('day',$newdate)->get();
        return view('backend.pages.report.searchbyday',compact('order','total'));
    }
    public function searchByMonth(Request $request)
    {
        $month = $request->month;
        $total = Order::orderBy('id','desc')->where('status',3)->where('month',$month)->sum('total');
        $order = Order::orderBy('id','desc')->where('status',3)->where('month',$month)->get();
        return view('backend.pages.report.searchbymonth',compact('order','total'));
    }
    public function searchByYear(Request $request)
    {
        $year = $request->year;
        $total = Order::orderBy('id','desc')->where('status',3)->where('year',$year)->sum('total');
        $order = Order::orderBy('id','desc')->where('status',3)->where('year',$year)->get();
        return view('backend.pages.report.searchbyyear',compact('order','total'));
    }

}
