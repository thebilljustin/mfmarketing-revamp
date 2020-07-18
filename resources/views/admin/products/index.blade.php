@extends('layouts.app')

@section('content')
<section id="dashboard">
    {!! $message !!}
    <div class="ui container segment">
            <form class="ui form center">
                <div class="ui input" style="width: 40%;">
                    <input type="text" placeholder="Product name or code...">
                    <button class="ui orange button">Search</button>
                </div>

                <!-- product table  -->
                <table class="ui celled small table">
                    <thead>
                        <tr>
                            <th class="six wide">Product Name</th>
                            <th class="four wide">Code</th>
                            <th>Stocked</th>
                            <th>Purchased</th>
                            <th>Missing</th>
                            <th>Defective</th>
                            <th>Returned</th>
                            <th>Remaining</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <td><a href="/admin/products/{{ $product->id }}">{{ $product->name }}</a></td>
                            <td>{{ $product->id }}</td>
                            <td class="collapsing center aligned">{{ $product->stocked }}</td>
                            <td class="collapsing center aligned">{{ $product->purchased }}</td>
                            <td class="collapsing center aligned">{{ $product->missing }}</td>
                            <td class="collapsing center aligned">{{ $product->defective }}</td>
                            <td class="collapsing center aligned">{{ $product->returned }}</td>
                            <td class="collapsing center aligned">{{ $product->remaining }}</td>
                        </tr>
                        @empty
                            <div class="ui tiny negative message" style="max-width: 400px; margin-top: 30px !important; margin: 0 auto; font-weight: 600;">No products available. Start adding by clicking <a href="{{ route('products.create') }}">here.</a></div>
                        @endforelse
                        
                        
                    </tbody>
                </table>
            </form>
    </div>
</section>
@endsection