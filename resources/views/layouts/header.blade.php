<h1>Developer's Best Friend</h1>
<hr>
<h3>@yield('title')</h3>

@section('menu')
<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <ul class="nav navbar-nav">
        {{-- class="active" --}}
        <li>
          <a href="/lorem-ipsum">Lorem Ipsum Generator</a>
        </li>
        <li>
          <a href="/user-generator">Random User Generator</a>
        </li>
        <li>
          <a href="/color-picker">Color Picker</a>
        </li>
        <li>
          <a href="/permissions-calculator">Permission Calculator</a>
        </li>
        <li>
          <a href="/xkcd-generator">xkcd Password Generator</a>
        </li>
      </ul>
  </div>
</nav>
@show

@yield('submenu')
