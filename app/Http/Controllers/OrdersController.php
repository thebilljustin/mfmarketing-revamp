<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
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
            $cart = Cart::find($new_item->id)->first();
            $cart_status = ['status' => 'confirmed'];
            $cart->update($cart_status);
        };
        // updates only one
    }
}
