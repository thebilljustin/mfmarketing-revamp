@extends('layouts.app')

@section('content')


<!-- content  -->
<section id="dashboard">
    <div class="ui container">
        <div class="container">
            @if ($count > 0)
            <div class="ui orange message white">
                You have an order pending for delivery. <a href="{{ route('orders.index') }}" class="orange-text" style="font-weight: 600;">Click here</a> to check its status.
            </div>
            @endif
            
            <form action="/dashboard/{{ Auth()->user()->id }}" method="post" class="ui very padded form segment">
                @method('PATCH')
                <!-- personal info  -->
                <h4 class="ui dividing header">Account Information</h4>
                <div class="three fields">
                    <div class="field">
                        <label>Firstname</label>
                        <input type="text" name="firstname" value="{{ Auth()->user()->firstname }}">
                        @error('firstname')<p style="color: red;">{{ $message }}</p>@enderror
                    </div>
                    <div class="field">
                        <label>Lastname</label>
                        <input type="text" name="lastname" value="{{ Auth()->user()->lastname }}">
                        @error('lastname')<p style="color: red;">{{ $message }}</p>@enderror
                    </div>
                    <div class="field">
                        <label>Email Address</label>
                        <input type="text" name="email" value="{{ Auth()->user()->email }}">
                        @error('email')<p style="color: red;">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="field">
                    <label>Change Password</label>
                </div>
                <div class="three fields">
                    <div class="field">
                        <input type="password" name="current_password" placeholder="Current Password">
                    </div>
                    <div class="field">
                        <input type="password" name="new_password" placeholder="New Password">
                    </div>
                    <div class="field">
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </div>
                </div>
                

                <!-- adding address  -->
                <h4 class="ui dividing header">Address</h4>
                <div class="two fields">
                    <div class="field">
                        <label>Street</label>
                        <input type="text" value="{{ Auth()->user()->street }}" name="street">
                        @error('street')<p style="color: red;">{{ $message }}</p>@enderror
                    </div>
                    <div class="field">
                        <label>Barangay</label>
                        <input type="text" value="{{ Auth()->user()->barangay }}" name="barangay">
                        @error('barangay')<p style="color: red;">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label>Municipality</label>
                        <input type="text" value="{{ Auth()->user()->municipality }}" name="municipality">
                        @error('municipality')<p style="color: red;">{{ $message }}</p>@enderror
                    </div>
                    <div class="field">
                        <label>City/Province</label>
                        <input type="text" value="{{ Auth()->user()->province }}" name="province">
                        @error('province')<p style="color: red;">{{ $message }}</p>@enderror
                    </div>
                </div>
                @csrf
                <button class="ui orange button right" name="updateBtn">Update</button>
                <button class="ui button right" name="clearBtn">Clear Fields</button>
                <br /><br />
                
            </form>
            <!-- delivery information  -->
            <h4 class="ui dividing header">Previous Transactions</h4>
            <div class="ui comments">
                @forelse ($orders as $ordered)
                    <div class="comment" style="border-left: 5px solid orange !important; padding-left: 10px;">
                        <div class="content">
                            <a href="/orders/{{ $ordered->id }}" class="author">{{ $ordered->delivery_address }}</a>
                            <div class="text">Total Price: P {{ $ordered->total_price }} | Status: Delivered  | {{ $ordered->delivery_date }} </div>
                        </div>
                    </div>
                @empty
                    <div class="ui small info message"><div class="ui small header">You have no previous orders with us yet.</div></div>
                @endforelse
                
                
            </div>
        </div>
    </div>
</section>
@endsection