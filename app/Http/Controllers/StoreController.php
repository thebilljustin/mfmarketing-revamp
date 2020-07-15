<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index() {
        $category = $_GET['category'];
        if ($category == 'all') {
            $items = Product::all();
        }
        else if ($category == 'Hardware and Construction' || $category == 'Motorcycle Parts' || $category == 'Poultry and Livestock Feeds') {
            $items = Product::where('category', $category);
        }
        else {
            return 'Page not found';
        }

        $message = $this->message('', '');
        
        return view('store.index', compact('items', 'message'));
    }

    public function add_to_cart(Request $request) {
       
        $data = request()->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required'
        ]);

        $check = Cart::where('user_id', $data['user_id'])
                        ->where('product_id', $data['product_id'])
                        ->where('status', 'pending')
                        ->first();
        if ($check) {
            $check->quantity += $data['quantity'];
            $check->save();
        }
        else {
            Cart::create($data);
        }
        
        $message = $this->message('success', 'Item added to your cart.');

        return redirect()->back()->with('message', $message);
    }

    private function message($type, $data) {
        
        if ($type == '') {
            $output = '';
        }
        else {
            $output = '<div class="ui small '. $type .' message" style="margin: 0 auto; max-width: 300px;"><div class="header">'. $data .'</div></div>';    
        }
        
        return $output;
    }
}
