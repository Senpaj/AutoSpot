<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotoOrder;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }
    public function ShowNotApprovedOrders()
    {
        $orders = MotoOrder::where('approved', '=', 0)->get();
        return view('notApprovedOrders', compact('orders'));
    }
}
