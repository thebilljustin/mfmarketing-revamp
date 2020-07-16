<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)
                            ->where('status', 'delivered')
                            ->get();

        $pending = Order::where('user_id', Auth::user()->id)
        ->where('status', 'pending')
        ->get();
       
        $count = $pending->count();

        return view('user.dashboard', compact('orders', 'count'));
    }
}
