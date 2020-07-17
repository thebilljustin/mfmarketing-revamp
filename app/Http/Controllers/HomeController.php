<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function update(Request $request, $id) 
    {
        $data = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'street' => 'required',
            'barangay' => 'required',
            'municipality' => 'required',
            'province' => 'required',
        ]);

        $user = User::find($id)->first();
        if (isset($request->new_password)) 
        {
            if ($request->new_password == $request->confirm_password)
            {
                $data['password'] = Hash::make($request->new_password);   
            }
            else 
            {
                // error here. like validation error
            }
        }
        else {
            $data['password'] = 'password';
        }
        
        $user->update($data);
        
        return redirect()->back();
    }
}
