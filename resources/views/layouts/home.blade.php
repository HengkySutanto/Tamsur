<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <script src="https://kit.fontawesome.com/a036457dfd.js" crossorigin="anonymous"></script>
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
</head>
<body class=@yield('bodyClass')>
    @yield('navbar')
    @yield('content')

    <script src="/js/app.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>