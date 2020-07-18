<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function sales() {

        $items = Cart::where('status', 'confirmed')->get();
        return view('admin.sales', compact('items'));
    }

}
