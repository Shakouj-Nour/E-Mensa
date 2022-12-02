<!doctype html>
<html class="no-js" lang="DE">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="unused">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">
    <div class="row">
        @yield('header')
    </div>
    <div class="row">
        @yield('main')
    </div>
    <div class="row">
        @yield('footer')
    </div>

</div>
</body>
</html>