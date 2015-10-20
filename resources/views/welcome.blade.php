@extends('layouts.master')

{{--
empty 'title' section so it will NOT display the menu bar on the front page
--}}
@section('title')

@stop

{{--
empty 'breadcrumb' section so it will NOT display the menu bar on the front page
--}}
@section('breadcrumb')

@stop

{{--
empty 'menu' section so it will NOT display the menu bar on the front page
--}}
@section('menu')

@stop

{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')

@stop

{{--
empty 'divider' section so it will NOT display the divider bar on the front page
--}}
@section('divider')

@stop

@section('content')
    <div class="jumbotron">
      <h1>Lorem Ipsum Generator</h1>
      <p>A generator for user to create dummy text as placeholder for designs on website, graphics, or publication. </p>
      <p><a class="btn btn-primary btn-lg" href="/lorem-ipsum" role="button">Lorem Ipsum Generator</a></p>
    </div>
    <div class="jumbotron">
      <h1>Random User Generator</h1>
      <p>A generator that will help you to create dummy users with dummy information to populate a database for testing.</p>
      <p><a class="btn btn-primary btn-lg" href="/user-generator" role="button">Random User Generator</a></p>
    </div>
    <div class="jumbotron">
      <h1>Permissions Calculator</h1>
      <p>A calculator to generate the octal notation from permissions input (encoding), as well as decoding an octal notation. more information at: <a href="http://permissions-calculator.org/info/">http://permissions-calculator.org/info/</a></p>
      <p><a class="btn btn-primary btn-lg" href="/permissions-calculator" role="button">Permissions Calculator</a></p>
      </div>
    <div class="jumbotron">
      <h1>Color Picker</h1>
      <p>This is a tool to convert colors: from HEX to RGB, from RGB to HEX, or pick a color from the color palette and convert it to RGB. idea inspired by: <a href="http://www.javascripter.net/faq/rgbtohex.htm">http://www.javascripter.net/faq/rgbtohex.htm</a></p>
      <p><a class="btn btn-primary btn-lg" href="/color-picker" role="button">Color Picker</a></p>
    </div>
    <div class="jumbotron">
      <h1>xkcd Password Generator</h1>
      <p>An easy to use password generator that will generate a random password that is easy for human to remember, but hard (or it takes a long time) for a computer to crack.</p>
      <p><a class="btn btn-primary btn-lg" href="/xkcd-generator" role="button">xkcd Password Generator</a></p>
    </div>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop
