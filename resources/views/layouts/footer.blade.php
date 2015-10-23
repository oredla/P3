{{-- breadcrumb is on the LEFT, while credit is on the RIGHT of the navbar-fixed-bottom --}}
@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="/">home</a></li>
    <li class="active">@yield('title')</li>
    </ol>
@show
