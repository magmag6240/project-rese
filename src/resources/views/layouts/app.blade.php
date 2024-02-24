<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
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
            @if(Route::is('shop.index'))
            <div class="shop-list-search">
                <form class="search-form" action="{{ route('shop.index') }}" method="get">
                    @csrf
                    <label class="select-sort">
                        <select class="search-sort" id="sort" name="sort">
                            <option class="option-default" value="">並び替え：評価高/低</option>
                            @foreach($kind_of_sort as $sort)
                            <option class="option-sort" value="{{ $sort->id }}">{{ $sort->kind_of_sort }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="select-area">
                        <select class="search-area" id="search_area" name="area">
                            <option value="">All area</option>
                            @foreach($prefectures as $pref)
                            <option value="{{ $pref->id }}">{{ $pref->pref_name }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="select-genre">
                        <select class="search-genre" id="search_genre" name="genre">
                            <option value="">All genre</option>
                            @foreach($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                            @endforeach
                        </select>
                    </label>
                    <button class="search-button"></button>
                    <input class="search-keyword" name="keyword" type="search" placeholder="Search ...">
                </form>
            </div>
            @endif
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
                        <a class="user" href="/login">user</a>
                        <a class="admin" href="/admin/login">admin</a>
                        <a class="shop-manager" href="/shop_manager/login">shop-manager</a>
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