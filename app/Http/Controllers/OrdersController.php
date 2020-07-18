<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index() {
        $order_status = ['pending', 'delivered', 'unclaimed', 'cancelled'];

        if (Auth::user()->account_type < 1) 
        {
            $orders = Order::where('user_id', Auth::user()->id)
                            ->where('status', 'pending')
                            ->get();
        }
        else 
        {
            if ($_GET['status'] == 'all') 
            {
                $orders = Order::all();
            }
            else if (in_array($_GET['status'], $order_status)) {
                $orders = Order::where('status', $_GET['status'])->get();
            }
            
        }

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order) 
    {   
        return view('orders.show', compact('order'));
    }

    public function store(Request $request) {
        $user_id = Auth::user()->id;
        $orders = '';

        $items = DB::table('carts')
                        ->where('carts.user_id', $user_id)
                        ->where('carts.status', 'pending')
                        ->join('products', 'carts.product_id', '=', 'products.id')
                        ->select('carts.*', 'products.name', 'products.price', 'products.remaining')
                        ->get();
        
        // get each item in cart
        foreach($items as $item) {
            
            if ($item->remaining < $item->quantity) {
                // return to cart here with error msg
            }
            else if ($item->remaining > $item->quantity){
                $orders .= $item->quantity .'pcs '. $item->name .' (P '. number_format($item->price, 2) .')<br />';
            }
        }

        // create order
        $data = $request->all();
        $data['user_id'] = $user_id;
        $data['user_name'] = Auth::user()->firstname .' '. Auth::user()->lastname;
        $data['orders'] = $orders;
        $data['status'] = 'pending';
        
        Order::create($data);
        
        // update cart status
        foreach($items as $new_item) {
            $cart = Cart::where('id', $new_item->id)->first();
            $cart->status = 'confirmed';
            $cart->save();
        };
       
        return redirect('/dashboard');
    }

    public function update(Order $order, Request $request)
    {
        $order->status = $request->status;
        $order->save();

        return redirect('/orders');
    }
}
