<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IRONMAN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container-fluid">
        <div id="app">

            <nav>
                <router-link to="/indexx">indexx123</router-link>
                <router-link to="/b">oh</router-link>
            </nav>
            <test />
            <indexx />
            <router-view></router-view>
        </div>
    </div>
</body>
<script src="{{ asset('js/app.js') }}"></script>

</html>
