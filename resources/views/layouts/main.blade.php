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
    <nav class="p-2 mt-0 w-full z-10 top-0">
        <div class="container mx-auto flex flex-wrap items-center">
            <div class="flex w-full md:w-1/2 justify-center md:justify-start text-gray-700 font-extrabold">
                <a class="text-gray-700 no-underline hover:text-gray-700 hover:no-underline" href="/">
                    <span class="text-2xl pl-2"><i class="fas fa-smile-wink"></i> Taekwondo Tamsur</span>
                </a>
            </div>
            <div class="flex w-full pt-2 content-center justify-between md:w-1/2 md:justify-end">
                <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                    <li class="mr-3">
                        <a class="inline-block py-2 px-4 text-gray-700 no-underline" href="/">Home</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-gray-500 no-underline hover:text-gray-400 hover:text-underline py-2 px-4" href="{{ route('members') }}">Members</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')

    <script src="/js/app.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>