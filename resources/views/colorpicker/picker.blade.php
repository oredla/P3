@extends('layouts.master')

@section('title')
Color Picker
@stop

@section('submenu')
    <ul class="nav nav-tabs">
      <li role="presentation"><a href="/color-picker">RGB to HEX</a></li>
      <li role="presentation" class="active"><a href="/color-picker/picker">Color Palette Picker</a></li>
      <li role="presentation"><a href="/color-picker/hex">HEX to RGB</a></li>
    </ul>
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
<h2>RGB to Hex via Color Palette Picker</h2>
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
      <?php
        $color = new Color();
        $color->fromHex($_POST['hexcolor']);
        // toRgbInt() returns the colors separated in RED, GREEN, BLUE in an array.
        $converted = $color->toRgbInt();
        ?>
        <h2 class="textcenter" style="color<?=$color?>;"><?=$color?></h2>
        <br>
        <h2 class="textcenter">
          <span style="color:red;">Red: <?=$converted['red']?></span>
            |
          <span style="color:green;">Green: <?=$converted['green']?></span>
            |
          <span style="color:blue;">Blue: <?=$converted['blue']?> </span>
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
