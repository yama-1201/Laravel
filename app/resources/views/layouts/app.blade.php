<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container d-flex justify-content-between align-items-center">
                <a class="navbar-brand" href="{{ route('toppage') }}">
                    レビューサイト
                </a>
                <a class="nav-link" href="{{ route('showShopall') }}">店舗の一覧へ</a>
                
                    <div class ="d-flex align-items-center">
                        @if(Auth::check())
                        <div class="navbar-nav d-flex flex-row align-items-center">
                            <div class="d-flex align-items-center">
                                <a href="{{ route('showMypage') }}" class="nav-link">{{ Auth::user()->name }}</a>
                                <span class="mx-1">/</span>
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    ログアウト
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf 
                                </form>   
                            </div>
                        </div>
                        @else
                            <div class="navbar-nav d-flex flex-row">
                                <div class="nav-item">
                                    <a class="nav-link" href="{{ route('showLogin') }}">ログイン</a>
                                </div>
                            </div>
                        @endif
                    </div>
            </div>    
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
