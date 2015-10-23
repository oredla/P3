@extends('layouts.master')

@section('title')
Color Picker - Palette
@stop

@section('submenu')
    @include('colorpicker.submenu')
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')
    <link href="/css/colorpicker.css" type='text/css' rel='stylesheet'>
@stop

@section('form')
<h2>HEX to RGB via Color Palette Picker</h2>
  <br>
    <form method="POST" class="form-inline" action="/color-picker/picker">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="color" name="hexcolor" value= {{{ $_POST['hexcolor'] or "#A41034"}}}>
      <br><br>
      <button type="submit" class="btn btn-primary">Convert</button>
    </form>
@stop

@section('content')
  @if(isset($_POST['_token']))
  <div class='output'>
        <h2 class="textcenter" style="color{{ $colorlist['color'] }};">{{ $colorlist['color'] }}</h2>
        <br>
        <h2 class="textcenter">
          <span style="color:red;">Red: {{ $colorlist['converted']['red'] }}</span>
            |
          <span style="color:green;">Green: {{ $colorlist['converted']['green'] }}</span>
            |
          <span style="color:blue;">Blue: {{ $colorlist['converted']['blue'] }} </span>
        </h2>
  </div>
    @endif
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop
