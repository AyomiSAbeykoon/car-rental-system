<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function index()
    {
        $customers = Customer::all()->count();
        $today_customer = Customer::whereDate('created_at', now()->today())->count();
        $month_customer = Customer::select('*')->whereMonth('created_at', Carbon::now()->month)->count();

        return view('pages.backend.dashboard',compact('customers','today_customer','month_customer'));
    }


}
