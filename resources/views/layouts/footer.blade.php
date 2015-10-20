{{-- breadcrumb is on the LEFT, while credit is on the RIGHT of the navbar-fixed-bottom --}}
@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="/">home</a></li>
    <li class="active">@yield('title')</li>
    <div style="float:right;"><a href="http://p1.orangeedward.xyz">Kar Ho Lau</a>, CSCI E-15, P3, &copy; {{ date('Y') }}</div>
  </ol>
@show
