<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('blog/css/main.css') }}">
    <link rel="icon" href="{{ asset('blog/img/favicon.png') }}" type="image/x-icon"/>
</head>
<body id="body">
<header class="header">
    <div class="wrapper">
        <div class="header__body" id="navbar">
            <a href="/" class="logo-wrap">
                <div class="header__logo">
                    <div class="logo">
                        <div class="logo__icon">
                            <div class="logo__line logo__line_1"></div>
                            <div class="logo__line logo__line_2"></div>
                            <div class="logo__line logo__line_3"></div>
                            <div class="logo__circle"></div>
                        </div>
                    </div>

                    <span class="logo__text">
					  Haku
				    </span>
                </div>
            </a>
            <div class="header__burger">
                <span></span>
                <span></span>
                <span></span>
            </div>


            <nav class="header__menu">
                <div class="menu__body">
                    <ul class="header__list">
                        <li class="header__link"><a href="{{ route('portfolio') }}">Портфолио</a></li>
                        <li class="header__link"><a href="{{ route('person') }}">Обо мне</a></li>
                        <li class="header__link"><a href="{{ route('feedback') }}">Связаться со мной</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<div class="main">
    <div class="wrapper">

    @yield('content')

    </div>
</div>
<footer class="footer">
    <div class="wave"></div>
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{asset("blog/js/main.js")}}"></script>
</body>
</html>
