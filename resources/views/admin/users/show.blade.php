@extends('layouts.app')

@section('content')
<section id="dashboard">
    
    <div class="ui container">
        <div class="ui card" style="width: 400px;">
            <div class="content">
                <div class="header">{{ $user->name }}</div>
                <div class="description">
                    {{ $user->email }} <br />
                    {{ $user->street .', '. $user->barangay .', '. $user->municipality .', '. $user->province }}<br />
                    {{ $user->created_at }}
                </div>
            </div>
        </div>
        <!-- product table  -->
        
        <table class="ui celled small table">
            <thead>
                <tr>
                    <th>Date Ordered</th>
                    <th>Orders</th>
                    <th>Total Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                <tr>
                    <td class="collapsing center aligned">{{ $user->created_at }}</td>
                    <td class="eight wide">{{ $user->orders }}</td>
                    <td class="collapsing center aligned">{{ $user->total_price }}</td>
                    <td class="collapsing center aligned">{{ $user->status }}</td>
                </tr>
                @empty
                    <div class="ui tiny negative message" style="max-width: 400px; margin-top: 30px !important; margin: 0 auto; font-weight: 600;">This person has not ordered anything yet.</a></div>
                @endforelse 
            </tbody>
        </table>
            
      
            
        
    </div>
</section>
@endsection