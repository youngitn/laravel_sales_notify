<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            @section('put-something-inside')
            <div>媽</div>
                @show
                @yield('content')
        </div>
    </nav>{{-- 我是註解 --}}
</body>

</html>
