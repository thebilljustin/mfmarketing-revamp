@extends('layouts.app')

@section('content')
<section id="dashboard">
    <div class="ui very padded container">
        <div class="container">
            <h3 class="ui header">{{ $order->user_name }}</h3>
            <div>Delivery Address: {{ $order->delivery_address }}</div>
            <div>Contact Number: {{ $order->phone }} </div>
            <div>Delivery Date: {{ date("M j, Y", strtotime($order->delivery_date)) }}</div>
            <div>Total Amount Due: {{ $order->total_price }} </div>
            <div>Delivery Status: {{ $order->status }} </div>
            <h4 class="ui dividing header">Ordered Items</h4>
            {!! $order->orders !!}

            <form action="/orders/{{ $order->id }}" method="post" style="margin-top: 30px;">
                @method('PATCH')

                @csrf
                @if (Auth()->user()->account_type > 0)
                    <button type="submit" name="status" value="delivered" class="ui small primary button right">Delivered</button>
                    <button type="submit" name="status" value="unclaimed" class="ui small positive button right">Unclaimed</button>
                    <button type="submit" name="status" value="pending" class="ui small orange button right">Pending</button>
                @endif
                
                <button type="submit" name="status" value="cancelled" class="ui small negative button right">Cancel Order</button>
            </form>
        </div>
    </div>
</section>
@endsection