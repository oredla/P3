@extends('layouts.master')

@section('title')
Color Picker
@stop

@section('submenu')
    <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="/color-picker">RGB to HEX</a></li>
      <li role="presentation"><a href="/color-picker/picker">Color Palette Picker</a></li>
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
<h2>RGB to HEX</h2>
  <br>
    <form method="POST" class="form-inline" action="/color-picker">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      Enter a number: (0-255) <br>
      <label for='Red'>Red:</label>
      <input type='number' id='Red' name='Red' class="form-control" placeholder="(0-255)" max=255 min=0 value= {{{ $_POST['Red'] or 164 }}}>
       <label for='Green'>Green:</label>
      <input type='number' id='Green' name='Green' class="form-control" placeholder="(0-255)" max=255 min=0 value= {{{ $_POST['Green'] or 16 }}}>
       <label for='Blue'>Blue:</label>
      <input type='number' id='Blue' name='Blue' class="form-control" placeholder="(0-255)" max=255 min=0 value= {{{ $_POST['Blue'] or 52 }}}>
      <br><br>
      <button type="submit" class="btn btn-primary">Convert</button>
    </form>
@stop

@section('content')
  @if(isset($_POST['Red']))
  <div class='output'>
      <?php
      $color = new Color();

      $converted = $color->fromRgbInt($_POST['Red'], $_POST['Green'], $_POST['Blue']);
      ?>
      <h2 class="textcenter" style="color:<?=$converted?>;"><?=$converted?></h2>
        <div style="margin-left:10%;margin-bottom:3em;height:100px;width:80%;background-color:<?=$converted?>;"></div>
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
