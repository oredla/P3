<ul class="nav nav-tabs">
  <li role="presentation" @if(Request::getRequestUri() == "/color-picker") class="active" @endif>
    <a href="/color-picker">RGB to HEX</a>
  </li>
  <li role="presentation" @if(Request::getRequestUri() == "/color-picker/picker") class="active" @endif>
    <a href="/color-picker/picker">Color Palette Picker</a>
  </li>
  <li role="presentation"  @if(Request::getRequestUri() == "/color-picker/hex") class="active" @endif>
    <a href="/color-picker/hex">HEX to RGB</a>
  </li>
</ul>
