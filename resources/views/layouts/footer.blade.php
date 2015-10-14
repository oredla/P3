@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="/">home</a></li>
    <li class="active">@yield('title')</li>
    <div style="float:right;">Kar Ho Lau, CSCI E-15, P3, &copy; {{ date('Y') }}</div>
  </ol>
@show
