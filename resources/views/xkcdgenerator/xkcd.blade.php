@extends('layouts.master')

@section('title')
    xkcd Password Generator
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')

@stop


@section('content')
{{-- HTML form used to ask user for an input --}}
{{-- the php if statements are used to set the values user entered after the form has been submitted  --}}
  <div class='form'>
    <form method="POST" class="form-inline">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      Enter a number: (1-9)
      <input type='number' name='wordCount' class="form-control" placeholder="(1-9)" max=9 min=1 style="width: 10em" value="4" required>
      <br>
      <br> Add a number
      <input type='checkbox' name='addNumber'>
      <br>
      <br> Add a symbol
      <input type='checkbox' name='addSymbol'>
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
    </div>
    <hr class='formHR'>
      @if(isset($_POST['wordCount']))
        <!-- include the algorithm php file -->
        <?php require("logic.php") ?>

        <div class='output'>
            <div id="PWGenBox" style="text-align:center;font-size:2em;word-wrap: break-word;">
                <?php echo $password ?>
            </div>
            <div id="howSecureBox" style="text-align: center;font-size: 1.3em;word-wrap: break-word;background-color: #666;color: white;width: 70%;margin: auto;">
                <?php echo $returnText ?>
                    <div class="progress">
                        <div class="progress-bar <?php echo $howSecureColor ?> progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $howSecurePrecentage ?>%">
                        </div>
                    </div>
            </div>
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
