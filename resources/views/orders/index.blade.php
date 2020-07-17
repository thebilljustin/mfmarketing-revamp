@extends('layouts.app')

@section('content')
<section id="dashboard">
    <div class="ui very padded container">
        <div class="container">
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
                        <div class="ui small header">You have no pending orders at this time.</div>
                    </div>
                @endforelse
                
               
            </div>
        </div>
    </div>
</section>

@endsection