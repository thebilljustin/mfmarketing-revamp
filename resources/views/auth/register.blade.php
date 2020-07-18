<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MF Marketing | Sign Up</title>
    <link href="{{ asset('css/semantic.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/materialize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <style>
    * {
      font-family: Raleway !important;
    }
    body {
      background: #292929;
    }
    </style>
</head>
<body>
    <section id="signup">
        <div class="ui very padded text container">
          <form class="ui form raised segment very padded" method="POST" action="{{ route('register') }}">
            @csrf
            <h2 class="ui header">Sign Up</h2>
            <div class="two fields">
                <div class="field">
                    <label class="left">Firstname</label>
                    <input type="text" name="firstname" placeholder="First Name" required>
                </div>
                <div class="field">
                    <label class="left">Lastname</label>
                    <input type="text" name="lastname" placeholder="Last Name" required>
                </div>
            </div>
            <div class="two fields">
                <div class="field">
                    <label class="left">Email Address</label>
                    <input type="text" name="email" placeholder="Email Address" required>
                </div>
                <div class="field">
                    <label class="left">Password</label>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
            </div>
            <div class="two fields">
                <div class="field">
                    <label class="left">Street</label>
                    <input type="text" name="street" placeholder="Street Address" required>
                </div>
                <div class="field">
                    <label class="left">Barangay</label>
                    <input type="text" name="barangay" placeholder="Barangay" required>
                </div>
            </div>
            <div class="two fields">
                <div class="field">
                    <label class="left">Municipality</label>
                    <input type="text" name="municipality" placeholder="Municipality" required>
                </div>
                <div class="field">
                    <label class="left">Province</label>
                    <input type="text" name="province" placeholder="City / Province" required>
                </div>
            </div>
            <p style="font-size: 15px;">
                Upon registration, you agree to our <a href="#" class="orange-text text-darken-2">Terms and Conditions</a>
                <br />Already have an account? <a href="login.html" class="orange-text text-darken-1">Login here</a>
            </p>
            <button class="ui orange button" type="submit">Sign Up</button>
          </form>
        </div>
      </section>

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    
</body>
</html>