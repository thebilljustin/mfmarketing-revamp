@extends('layouts.app')

@section('content')
<section id="cart">
    <div class="ui very padded container center">
        <div class="container">

        <table class="ui small table">
            <thead class="orange white-text">
                <tr>
                    <th >Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    @php
                        $total += $item->price * $item->quantity
                    @endphp
                    <tr>
                        <td><b>{{ $item->name }}</b></td>
                        <td>P {{ number_format($item->price, 2) }}</td>
                        <form action="/cart/{{ $item->id }}" method="post">
                        <td>
                            <div class="ui input">
                                <input type="number" name="quantity" value="{{ $item->quantity }}" style="width: 70px;">
                            </div>
                        </td>
                        <td>P {{ number_format($item->price * $item->quantity, 2) }}</td>
                        <td class="collapsing">
                            
                                @method('PATCH')
                                @csrf
                                <button class="ui icon orange mini button center" type="submit"><i class="trash icon"></i></button>
                            
                        </td>
                    </form>
                        <td class="collapsing">
                            <form action="/cart/{{ $item->id }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="ui icon orange mini button center" type="submit"><i class="trash icon"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="center">There are no items in your cart.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="ui card" style="width: 100%;">
            
            <div class="content left aligned">
                Confirm delivery address on checkout.
                <a class="secondary-content checkout" style="margin-right: 30px !important;"><h5 class="orange-text">| Checkout Items</h5></a>
                <a class="secondary-content" style="margin-right: 30px !important;"><h5>Total Due: P {{ number_format($total, 2 ) }}</h5></a>
            </div>
        </div>
        <form class="ui form tiny modal" method="post" action="{{ route('orders.store') }}" style="margin: 0 auto; margin-top: -30px !important;">
            <div class="header">Confirm Checkout</div>
            <div class="content">
                <input type="hidden" name="total_price" value="{{ number_format($total, 2 ) }}">
                <div class="two fields">
                    <div class="field">
                        <label for="">Contact Number</label>
                        <input type="text" name="phone" placeholder="Phone Number" >
                    </div>
                    <div class="field">
                        <label for="">Preferred Delivery Date</label>
                        <input type="date" name="delivery_date" >
                    </div>
                </div>
                <div class="field">
                    <label for="">Address</label>
                    <input type="text" name="delivery_address" placeholder="Delivery Address" >
                </div>
                <div class="field">
                    @csrf
                    <button class="ui orange tiny button white-text" type="submit"><h5 class="white-text text-darken-1">Checkout Items</h5></button>
                </div>
            </div>   
        </form>
        </div>
    </div>
</section>

@endsection
@section('scripts')
<script>
    $('.tiny.modal').modal('attach events', '.checkout', 'show');

    
</script>
@endsection