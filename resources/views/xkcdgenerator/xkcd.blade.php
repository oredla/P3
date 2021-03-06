@extends('layouts.master')

@section('title')
    xkcd Password Generator
@stop

@section('head')
    <link href="/css/xkcd.css" type='text/css' rel='stylesheet'>
@stop

@section('form')
{{-- HTML form used to ask user for an input --}}
{{-- the php if statements are used to set the values user entered after the form has been submitted  --}}
  <form method="POST" class="form-inline" action="/xkcd-generator">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    Enter a number: (1-9)
    <input type='number' name='wordCount' class="form-control" placeholder="(1-9)" max=9 min=1 style="width: 10em" value= {{{ $_POST['wordCount'] or 4 }}} required>
    <br>
    <br> <label for="addNumber">Add a number</label>
    <input type='checkbox' name='addNumber' id='addNumber' @if(isset($_POST['addNumber'])) checked @endif>
    <br>
    <br> <label for="addSymbol">Add a symbol</label>
    <input type='checkbox' name='addSymbol' id='addSymbol' @if(isset($_POST['addSymbol'])) checked @endif>
    <br>
    <br>Select a separator ( -.*^%$@! )
    <select name="addSeparator">
      <option value="-">-</option>
      <option value=".">.</option>
      <option value="*">*</option>
      <option value="^">^</option>
      <option value="%">%</option>
      <option value="$">$</option>
      <option value="@">@</option>
      <option value="!">!</option>
    </select>
    <br>
    <br>
    <button type="submit" class="btn btn-primary">Generate</button>
  </form>
@stop

@section('content')
      @if(isset($_POST['_token']))
        {{-- the result output in the content  --}}
        <div class='output'>
            <div id="PWGenBox">
                <?= $output['password'] ?>
            </div>
            <div id="howSecureBox">
                <?= $output['howSecure']?>
                    <div class="progress">
                        <div class="progress-bar <?=$output['howSecureColor']?>
                          progress-bar-striped" role="progressbar"
                          aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                          style="width: <?=$output['howSecurePrecentage']?>%">
                        </div>
                    </div>
            </div>
        </div>
      @endif

@stop
