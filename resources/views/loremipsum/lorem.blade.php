@extends('layouts.master')

@section('title')
Lorem Ipsum Generator
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
       @if(isset($_POST['_token']))
        <div class='output'>
            <?= $output ?>
        </div>
      @endif
@stop
