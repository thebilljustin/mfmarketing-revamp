<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MF Marketing | Sign In</title>
    <link rel="stylesheet" href="{{ asset('css/semantic-form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/semantic-misc.css') }}">
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
  <section id="login">
    <div class="ui very padded text container">
      <form class="ui raised form segment very padded" method="POST" action="{{ route('login') }}">
        @csrf
        <h2 class="ui header">Sign In</h2>
        <div class="field">
            <label>Email Address</label>
            <input type="text" name="email" placeholder="Email Address" autocomplete="email" autofocus>
          </div>
        <div class="field">
          <label>Password</label>
          <input type="password" name="password" placeholder="Password" autocomplete="current-password">
        </div>
        <p style="font-size: 15px; font-weight: 600;"><a href="forgot&password.html" class="orange-text darken-4">Forgot password?</a></p>
        <a href="/register" class="ui button" type="submit">Sign Up</a>
        <button class="ui orange button" type="submit">Sign In</button>
      </form>
    </div>
  </section>

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    
</body>
</html>