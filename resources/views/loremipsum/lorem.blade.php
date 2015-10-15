@extends('layouts.master')

@section('title')
Lorem Ipsum Generator
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')

@stop

@section('form')
  <form method="POST" class="form-inline" action="/lorem-ipsum">
    How many paragraphs do you want? (Max: 99)
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="number" class="form-control" name="loreminput" min="1" max="99" value= {{{ $_POST['loreminput'] or 5 }}}>
    <button type="submit" class="btn btn-primary">Generate</button>
  </form>
@stop

@section('content')
      @if(isset($_POST['loreminput']))
          <div class='output'>
          <?php
          $generator = new Badcow\LoremIpsum\Generator();
          $paragraphs = $generator->getParagraphs($_POST['loreminput']);
          echo '<p>' . implode('</p><p>', $paragraphs) . '</p>';
          ?>
        </div>
      @endif
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    {{-- <script src="/js/books/show.js"></script> --}}
@stop
