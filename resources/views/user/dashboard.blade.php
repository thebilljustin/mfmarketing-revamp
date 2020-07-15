@extends('layouts.app')

@section('content')


<!-- content  -->
<section id="dashboard">
    <div class="ui container">
        <div class="container">
            <div class="ui orange message white">
                You have an order pending for delivery. <a href="" class="orange-text" style="font-weight: 600;">Click here</a> to check its status.
            </div>
            <form action="" class="ui very padded form segment">

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
                <button class="ui orange button right" name="updateBtn">Update</button>
                <button class="ui button right" name="clearBtn">Clear Fields</button>
                <br /><br />

                <!-- adding address  -->
                <h4 class="ui dividing header">Add Delivery Address</h4>
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
                <button class="ui orange button right" name="addAddressBtn">Add Address</button>
                <br /><br /><br />
                <!-- delivery information  -->
                <h4 class="ui dividing header">Delivery Information</h4>
                <div class="ui middle aligned divided list">
                    <div class="item">
                        <div class="right floated content">
                            <button class="ui orange icon button" name="viewAddressBtn" value=""><i class="cart icon"></i></button>
                        </div>
                        <p style="padding-top: 5px;">Blk 3 Lot 57 Phase 9, Golden City, Dasmarinas, Cavite</p>
                        
                    </div>
                    <div class="item">
                        <div class="right floated content">
                            <button class="ui orange icon button"><i class="cart icon"></i></button>
                        </div>
                        <p style="padding-top: 5px;">Blk 3 Lot 57 Phase 9, Golden City, Dasmarinas, Cavite</p>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</section>
@endsection