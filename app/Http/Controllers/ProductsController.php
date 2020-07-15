<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        $message = '';
        $products = Product::all();
        return view('admin.products.index', compact('message', 'products'));
    }

    public function create() {
        return view('admin.products.create');
    }

    public function store(Request $request) {
        
        $data = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price'  => 'required',
            'stocked' => 'required',
        ]);

        $data['remaining'] = $data['stocked'];
        
        if (Product::create($data)) {
            $message = '<div class="ui success center tiny message" style="max-width: 500px; margin: 0 auto;"><div class="header">Product added!</div></div>';
        }
        else {
            $message = '<div class="ui negative center tiny message" style="max-width: 500px; margin: 0 auto;"><div class="header">Product failed to add. Please try again.</div></div>';
        }

        $products = Product::all();

        return view('admin.products.index', compact('message', 'products'));
    }

    public function show($id) {
        
        $product = Product::where('id', $id)->first();

        return view('admin.products.show', compact('product'));
    }

    public function update(Product $product) {
        $data = request()->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'stocked' => 'required',
            'missing' => 'required',
            'defective' => 'required',
            'returned' => 'required',
        ]);

        $product->update($data);

        return redirect()->back();
    
    }
}
