<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    @yield('css')
</head>

<body class="body">
    <header class="header">
        <div class="menu">
            <div class="menu-button">
                <span class="menu-close"></span>
                <span class="menu-open"></span>
            </div>
            <h1 class="app-logo">Rese</h1>
            <nav class="menu-nav">
                <ul class="menu-list">
                    <li class="menu-list-contents">
                        <a class="menu-link" href="/">Home</a>
                    </li>
                    @if (!Auth::guard('admin')->check() && !Auth::guard('web')->check() && !Auth::guard('shop_manager')->check())
                    <li class="menu-list-contents">
                        <a class="menu-link" href="/register">Register</a>
                    </li>
                    <li class="menu-list-contents">
                        <span class="menu-link">Login</span><br>
                        <a class="menu-link" href="/login">user</a>
                        <a class="menu-link" href="/admin/login">admin</a>
                        <a class="menu-link" href="/shop_manager/login">shop-manager</a>
                    </li>
                    @endif
                    @if (Auth::guard('admin')->check() || Auth::guard('web')->check() || Auth::guard('shop_manager')->check())
                    <form class="logout-form" action="/logout" method="post">
                        @csrf
                        <li class="menu-list-contents">
                            <button class="logout-button" type="submit">Logout</button>
                        </li>
                    </form>
                    @endif
                    @if (Auth::guard('web')->check())
                    <li class="menu-list-contents">
                        <a class="menu-link" href="/mypage">Mypage</a>
                    </li>
                    @endif
                    @if (Auth::guard('admin')->check())
                    <li class="menu-list-contents">
                        <a class="menu-link" href="/admin">For Admin</a>
                    </li>
                    @endif
                    @if (Auth::guard('shop_manager')->check())
                    <li class="menu-list-contents">
                        <a class="menu-link" href="/shop_manager">For ShopManager</a>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>
</body>
<script src="{{ mix('js/menu.js') }}"></script>

</html>