<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">Amazing E-Grocery</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">{{ __('app.layout.home') }}</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('cart') }}">{{ __('app.layout.cart') }}</a>
                    </li>
                    @if(auth()->user()->role->name === 'Admin')
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('maintenance') }}">{{ __('app.layout.maintenance') }}</a>
                    </li>
                    @endif
                    @endauth
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('app.layout.lang') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('lang', ['lang' => 'en']) }}">EN</a></li>
                        <li><a class="dropdown-item" href="{{ route('lang', ['lang' => 'id']) }}">ID</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link disabled">{{ __('app.lang') }}</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @guest
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('view.login') }}">{{ __('app.layout.login') }}</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('view.register') }}">{{ __('app.layout.register') }}</a>
                    </li>
                    @else
                    <li class="nav-item">
                    <a class="btn btn-primary " aria-current="page" href="{{ route('profile', ['id' => auth()->user()->id]) }}">{{ auth()->user()->email . ' | ' . auth()->user()->role->name }}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="nav-link active" aria-current="page" href="#">{{ __('app.layout.logout') }}</button>
                        </form>
                    </li>
                    @endguest
                </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
</body>
</html>
