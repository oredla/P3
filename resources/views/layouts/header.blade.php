{{-- HEADER.BLADE.PHP --}}
{{-- header with Site's name and the 'title' name of the tool --}}
<h1>Developer's Best Friend</h1>
<hr>
<h3>@yield('title')</h3>

{{-- navigation menubar --}}
@section('menu')
<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <ul class="nav navbar-nav">
        {{-- There are IF tests to set test which page we are currently on and highlight the page as active --}}
        <li @if(Request::getRequestUri() == "/lorem-ipsum") class="active" @endif>
          <a href="/lorem-ipsum">Lorem Ipsum Generator</a>
        </li>
        <li @if(Request::getRequestUri() == "/user-generator") class="active" @endif>
          <a href="/user-generator" >Random User Generator</a>
        </li>
        <li @if(Request::getRequestUri() == "/color-picker") class="active" @endif>
          <a href="/color-picker">Color Picker</a>
        </li>
        <li @if(Request::getRequestUri() == "/permissions-calculator") class="active" @endif>
          <a href="/permissions-calculator">Permission Calculator</a>
        </li>
        <li @if(Request::getRequestUri() == "/xkcd-generator") class="active" @endif>
          <a href="/xkcd-generator">xkcd Password Generator</a>
        </li>
      </ul>
  </div>
</nav>
@show

{{-- this will display the submenu if the tool specificially have a submenu --}}
@yield('submenu')
