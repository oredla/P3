<!doctype html>
{{-- this is the MASTER template file for layout for all of the pages. --}}
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
      {{-- calls for the header of the HTML page, including the navigation bar that is within the HEADER.BLADE.PHP --}}
      @include('layouts.header')
    </header>

    <section id="form">
        <div class='form'>
          {{-- Main page FORM will be yielded here --}}
          @yield('form')
        </div>
    </section>
      {{-- putting it with blade programming @section('divider') so that when this master template is used by the
      welcome page, it will be able to substitute its own empty section and will NOT display the dividing line --}}
      @section('divider')
        <hr class='formHR'>
      @show
    <section>
      {{-- this is the ERROR PRINTING section, to output error messages for users to correct the input on the form. --}}
        @if(count($errors) > 0)
            <ul class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </section>

    <section id="content">
        {{-- Main page RESULT will be yielded here --}}
        @yield('content')
    </section>

    <footer class="footer">
      <div class="container navbar-fixed-bottom">
        {{-- calls the FOOTER.BLADE.PHP for the footer credit as well as the BREADCRUMB. --}}
        @include('layouts.footer')
      </div>
    </footer>
</div>
    {{-- loading CSS for FONT from Google Fonts API, for structure and design from BOOTSTRAP CDN, and main.css --}}
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900,100' rel='stylesheet' type='text/css'>
    {{-- main.css includes general items that needs styling, 
      with some !important added to override the default setting from Bootstrap --}}
    <link href="/css/main.css" type='text/css' rel='stylesheet'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
