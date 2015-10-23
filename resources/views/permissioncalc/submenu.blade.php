<ul class="nav nav-tabs">
  <li role="presentation" @if(Request::getRequestUri() == "/permissions-calculator") class="active" @endif>
    <a href="/permissions-calculator">Octal Encoder</a>
  </li>
  <li role="presentation" @if(Request::getRequestUri() == "/permissions-calculator/decoder") class="active" @endif>
    <a href="/permissions-calculator/decoder">Octal Decoder</a>
  </li>
</ul>
