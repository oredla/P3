@extends('layouts.master')

@section('title')
Color Picker - HEX to RGB
@stop

@section('submenu')
    @include('colorpicker.submenu')
@stop

{{-- This `head` section will be yielded right before the closing </head> tag. --}}
@section('head')
    <link href="/css/colorpicker.css" type='text/css' rel='stylesheet'>
@stop

@section('form')
<h2>HEX to RGB</h2>
  <br>
    <form method="POST" class="form-inline" action="/color-picker/hex">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      Enter a HEX color: (i.e. FF9900): <br>
      <input type='text' maxlength=6 name='hexcolor' class="form-control" placeholder="please enter a HEX color" value= {{{ $_POST['hexcolor'] or "FF9900" }}}>
      <br><br>
      <button type="submit" class="btn btn-primary">Convert</button>
    </form>
@stop

@section('content')
  @if(isset($_POST['_token']))
  <div class='output'>
        <br>
        <div style="margin-left:10%;margin-bottom:3em;height:100px;width:80%;background-color:{{ $colorlist['color'] }};"></div>
        <h2 class="textcenter">
          <span style="color:red;">Red: {{ $colorlist['converted']['red'] }}</span>
            |
          <span style="color:green;">Green: {{ $colorlist['converted']['green'] }}</span>
            |
          <span style="color:blue;">Blue: {{ $colorlist['converted']['blue'] }}</span>
        </h2>
  </div>
    @endif
@stop
