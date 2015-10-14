<!doctype html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'Developer\'s Best Friend' --}}
        @yield('title','Developer\'s Best Friend')
    </title>
    <meta charset='utf-8'>

    {{-- Yield any page specific CSS files or anything else you might want in the html head --}}
    @yield('head')

</head>
<body>
  <div class='container'>
    <header>
      @include('layouts.header')
    </header>

    <section>
        {{-- Main page content will be yielded here --}}
        @yield('content')
    </section>

    <footer class="footer">
      <div class="container navbar-fixed-bottom">
        @include('layouts.footer')
      </div>
    </footer>
</div>

    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900,100' rel='stylesheet' type='text/css'>
    <link href="css/main.css" type='text/css' rel='stylesheet'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->

    <!-- Latest compiled and minified JavaScript -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
