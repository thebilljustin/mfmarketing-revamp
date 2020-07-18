@extends('layouts.app')

@section('content')
<section id="dashboard">
    <div class="ui very padded container">
        <div class="container">
            @if (Auth()->user()->account_type > 0)
                <div class="row center">
                    <a href="/orders?status=all" class="ui tiny green button">All Orders</a>
                    <a href="/orders?status=pending" class="ui tiny orange button">Pending</a>
                    <a href="/orders?status=delivered" class="ui tiny primary button">Delivered</a>
                    <a href="/orders?status=cancelled" class="ui tiny negative button">Cancelled</a>
                    <a href="/orders?status=unclaimed" class="ui tiny purple button">Unclaimed</a>
                </div>
                <br />
            @endif
            <div class="ui two column grid">
                @forelse ($orders as $order)
                    <ul class="collection" style="width: 100%; margin-bottom: 1px;">
                        <li class="collection-item" >
                            <a href="/orders/{{ $order->id }}">{{ $order->delivery_address }}</a>
                            
                            <span class="secondary-content" style="font-family: Calibri;">
                                 {{ $order->user_name }} |
                                 P {{ $order->total_price }} |
                                <span class="orange-text" style="font-family: Calibri;">{{ date("M j, Y", strtotime($order->delivery_date)) }}</span>
                            </span>
                        </li>
                    </ul>
                @empty
                    <div class="ui info tiny message" style="margin: 0 auto;">
                        <div class="ui small header">You have no {{ $_GET['status'] }} orders at this time.</div>
                    </div>
                @endforelse
                
               
            </div>
        </div>
    </div>
</section>

@endsection