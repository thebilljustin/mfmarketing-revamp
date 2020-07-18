<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/semantic.min.css') }}" rel="stylesheet">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet"> --}}
</head>
<body>
        <div class="navbar-fixed"> 
            <nav class="grey darken-3">
                <div class="nav-wrapper container">
                    <a href="#" class="brand-logo left">MF Marketing</a>
                    <a href="#" data-activates="side-nav" class="button-collapse right"><i class="material-icons white-text hide-on-large-only">menu</i></a>
                    <ul class="hide-on-med-and-down right">
                        @if (Auth()->user()->account_type > 0)
                            <li><a href="/admin">Dashboard</a></li>
                            <li><a href="/admin/users">Users</a></li>
                            <li><a href="{{ route('products.index') }}">Inventory</a></li>
                            <li><a href="/admin/sales">Sales</a></li>
                            <li><a href="{{ route('products.create') }}">Products</a></li>
                        @else 
                            <li><a href="/dashboard">Dashboard</a></li>
                            <li><a href="/store?category=all">Store</a></li>
                            <li><a href="{{ route('cart.index') }}">Cart</a></li>
                        @endif
                        <li><a href="/orders?status=all">Orders</a></li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        
        <main class="py-4">
            @yield('content')
        </main>
        
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/semantic.min.js') }}"></script>
    @yield('scripts')
</body>
</html>
