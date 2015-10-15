@extends('layouts.master')

@section('title')
Permission Calculator (Encoder)
@stop

@section('submenu')
    <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="/permissions-calculator">Octal Encoder</a></li>
      <li role="presentation"><a href="/permissions-calculator/decoder">Octal Decoder</a></li>
    </ul>
@stop

{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')
    <link href="/css/octal.css" type='text/css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
@stop

@section('form')
<h2>@yield('title')</h2>
  <br>
  Select the permissions you require below. This tool will provide you with
  an octal code that corresponds to these permissions which can then be
  applied to relevant directories and files with chmod.
   <br>
    <form method="POST" class="form-inline" action="/permissions-calculator">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <fieldset id="Special">
          <legend>Special</legend>
            <div class='octalcheckbox'><input type="checkbox" name="setuid" value="4000" id="setuid"
            @if(isset($_POST['setuid'])) checked="checked" @endif><label for="setuid"> setuid</label></div>
            <div class='octalcheckbox'><input type="checkbox" name="setgid" value="2000" id="setgid"
            @if(isset($_POST['setgid'])) checked="checked" @endif><label for="setgid"> setgid</label></div>
            <div class='octalcheckbox'><input type="checkbox" name="stickybit" value="1000" id="stickybit"
            @if(isset($_POST['stickybit'])) checked="checked" @endif><label for="stickybit"> sticky bit</label></div>
        </fieldset>
        <fieldset id="User">
          <legend>User</legend>
            <div class='octalcheckbox'><input type="checkbox" name="uRead" value="400" id="uRead"
            @if(isset($_POST['uRead'])) checked="checked" @endif><label for="uRead"> Read </label></div>
            <div class='octalcheckbox'><input type="checkbox" name="uWrite" value="200" id="uWrite"
            @if(isset($_POST['uWrite'])) checked="checked" @endif><label for="uWrite"> Write</label></div>
            <div class='octalcheckbox'><input type="checkbox" name="uExecute" value="100" id="uExecute"
            @if(isset($_POST['uExecute'])) checked="checked" @endif><label for="uExecute"> Execute</label></div>
        </fieldset>
        <fieldset id="Group">
          <legend>Group</legend>
            <div class='octalcheckbox'><input type="checkbox" name="gRead" value="40" id="gRead"
            @if(isset($_POST['gRead'])) checked="checked" @endif><label for="gRead"> Read</label></div>
            <div class='octalcheckbox'><input type="checkbox" name="gWrite" value="20" id="gWrite"
            @if(isset($_POST['gWrite'])) checked="checked" @endif><label for="gWrite"> Write</label></div>
            <div class='octalcheckbox'><input type="checkbox" name="gExecute" value="10" id="gExecute"
            @if(isset($_POST['gExecute'])) checked="checked" @endif><label for="gExecute"> Execute</label></div>
        </fieldset>
        <fieldset id="Other">
          <legend>Other</legend>
            <div class='octalcheckbox'><input type="checkbox" name="oRead" value="4" id="oRead"
            @if(isset($_POST['oRead'])) checked="checked" @endif><label for="oRead"> Read</label></div>
            <div class='octalcheckbox'><input type="checkbox" name="oWrite" value="2" id="oWrite"
            @if(isset($_POST['oWrite'])) checked="checked" @endif><label for="oWrite"> Write</label></div>
            <div class='octalcheckbox'><input type="checkbox" name="oExecute" value="1" id="oExecute"
            @if(isset($_POST['oExecute'])) checked="checked" @endif><label for="oExecute"> Execute</label></div>
        </fieldset>
      <br><br>
      <button type="submit" class="btn btn-primary">Convert</button>
    </form>
@stop

@section('content')
  @if(isset($_POST['_token']))
  <div class='output'>
      <h4 class="textcenter">Absolute Notation (octal)</h4>
      <?php $octal = 0; ?>
      @foreach($_POST as $key => $value)
          <?php
            $octal = $octal + $value;
            ?>
      @endforeach
      @if(isset($_POST['setuid']) and !isset($_POST['uExecute']))
      <div class="alert alert-danger" role="alert">User must have execute rights for setuid to work</div>
      @endif
      @if(isset($_POST['setgid']) and !isset($_POST['gExecute']))
      <div class="alert alert-danger" role="alert">Group must have execute rights for setgid to work</div>
      @endif
      @if(isset($_POST['stickybit']) and !isset($_POST['oExecute']))
      <div class="alert alert-danger" role="alert">Other must have execute rights for sticky bit to work</div>
      @endif
      <h2 class="textcenter supersize "><?php printf("%04d",$octal)?></h2>
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
