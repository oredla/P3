<!doctype html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'Developer\'s Best Friend' --}}
        @yield('title','Developer\'s Best Friend')
    </title>
    <meta charset='utf-8'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900,100' rel='stylesheet' type='text/css'>
    <link href="css/main.css" type='text/css' rel='stylesheet'>

    {{-- Yield any page specific CSS files or anything else you might want in the html head --}}
    @yield('head')

</head>
<body>

    <header>
      @include('layouts.header')

    </header>

    <section>
        {{-- Main page content will be yielded here --}}
        @yield('content')
    </section>

    <footer>
        &copy; {{ date('Y') }}
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
