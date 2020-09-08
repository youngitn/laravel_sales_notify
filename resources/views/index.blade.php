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
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">IRONMAN</a>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div id="app">
            <test />
            <router-view></router-view>
        </div>
    </div>
</body>
<script src="{{ asset('js/app.js') }}"></script>

</html>
