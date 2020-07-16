@extends('layouts.app')

@section('content')


<!-- content  -->
<section id="dashboard">
    <div class="ui container">
        <div class="container">
            <?php
                if ($count > 0) {
                    echo '<div class="ui orange message white">
                            You have an order pending for delivery. <a href="" class="orange-text" style="font-weight: 600;">Click here</a> to check its status.
                        </div>';
                }
            ?>
            <form action="" method="post" class="ui very padded form segment">
                @method('PATCH')
                <!-- personal info  -->
                <h4 class="ui dividing header">Account Information</h4>
                <div class="three fields">
                    <div class="field">
                        <label>Firstname</label>
                        <input type="text" name="firstname" value="{{ Auth()->user()->firstname }}">
                    </div>
                    <div class="field">
                        <label>Lastname</label>
                        <input type="text" name="lastname" value="{{ Auth()->user()->lastname }}">
                    </div>
                    <div class="field">
                        <label>Email Address</label>
                        <input type="text" name="email" value="{{ Auth()->user()->email }}">
                    </div>
                </div>
                <div class="field">
                    <label>Change Password</label>
                </div>
                <div class="three fields">
                    <div class="field">
                        <input type="password" name="currentPassword" placeholder="Current Password">
                    </div>
                    <div class="field">
                        <input type="password" name="newPassword" placeholder="New Password">
                    </div>
                    <div class="field">
                        <input type="password" name="confirmPassword" placeholder="Confirm Password">
                    </div>
                </div>
                

                <!-- adding address  -->
                <h4 class="ui dividing header">Address</h4>
                <div class="two fields">
                    <div class="field">
                        <label>Street</label>
                        <input type="text" value="{{ Auth()->user()->street }}" name="street">
                    </div>
                    <div class="field">
                        <label>Barangay</label>
                        <input type="text" value="{{ Auth()->user()->barangay }}" name="barangay">
                    </div>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label>Municipality</label>
                        <input type="text" value="{{ Auth()->user()->municipality }}" name="municipality">
                    </div>
                    <div class="field">
                        <label>City/Province</label>
                        <input type="text" value="{{ Auth()->user()->province }}" name="province">
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
                            <a href="" class="author">{{ $ordered->delivery_address }}</a>
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