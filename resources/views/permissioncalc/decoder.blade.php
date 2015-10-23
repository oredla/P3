@extends('layouts.master')

@section('title')
Permission Calculator (Decoder)
@stop

@section('submenu')
    @include('permissioncalc.submenu')
@stop

{{-- This `head` section will be yielded right before the closing </head> tag. --}}
@section('head')
    @include('permissioncalc.permissionhead')
@stop

@section('form')
<h2>@yield('title')</h2>
  <br>
  Enter an octal code below and the tool will tell you what permissions correspond to that code.
   <br>
    <form method="POST" class="form-inline" action="/permissions-calculator/decoder">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type='number' name='notation' class="form-control" placeholder="please enter a 4 digit notation" value= {{{ $_POST['notation'] or "0000" }}}>
      <br><br>
      <button type="submit" class="btn btn-primary">Convert</button>
    </form>
@stop

@section('content')
  @if(isset($_POST['_token']))
  {{-- ALERTS --}}
  <div class='output textcenter'>
    @if(isset($output['setuid']) and !isset($output['uExecute']))
    <div class="alert alert-danger" role="alert">User must have execute rights for setuid to work</div>
    @endif
    @if(isset($output['setgid']) and !isset($output['gExecute']))
    <div class="alert alert-danger" role="alert">Group must have execute rights for setgid to work</div>
    @endif
    @if(isset($output['stickybit']) and !isset($output['oExecute']))
    <div class="alert alert-danger" role="alert">Other must have execute rights for sticky bit to work</div>
    @endif
    {{-- OUTPUT --}}
      <fieldset id="Special">
      <legend>Special</legend>
        <div class='octalcheckbox'><input disabled type="checkbox" name="setuid" value="4000" id="setuid"
        @if(isset($output['setuid'])) checked="checked" @endif><label for="setuid"> setuid</label></div>
        <div class='octalcheckbox'><input disabled type="checkbox" name="setgid" value="2000" id="setgid"
        @if(isset($output['setgid'])) checked="checked" @endif><label for="setgid"> setgid</label></div>
        <div class='octalcheckbox'><input disabled type="checkbox" name="stickybit" value="1000" id="stickybit"
        @if(isset($output['stickybit'])) checked="checked" @endif><label for="stickybit"> sticky bit</label></div>
      </fieldset>
      <fieldset id="User">
      <legend>User</legend>
        <div class='octalcheckbox'><input disabled type="checkbox" name="uRead" value="400" id="uRead"
        @if(isset($output['uRead'])) checked="checked" @endif><label for="uRead"> Read </label></div>
        <div class='octalcheckbox'><input disabled type="checkbox" name="uWrite" value="200" id="uWrite"
        @if(isset($output['uWrite'])) checked="checked" @endif><label for="uWrite"> Write</label></div>
        <div class='octalcheckbox'><input disabled type="checkbox" name="uExecute" value="100" id="uExecute"
        @if(isset($output['uExecute'])) checked="checked" @endif><label for="uExecute"> Execute</label></div>
      </fieldset>
      <fieldset id="Group">
      <legend>Group</legend>
        <div class='octalcheckbox'><input disabled type="checkbox" name="gRead" value="40" id="gRead"
        @if(isset($output['gRead'])) checked="checked" @endif><label for="gRead"> Read</label></div>
        <div class='octalcheckbox'><input disabled type="checkbox" name="gWrite" value="20" id="gWrite"
        @if(isset($output['gWrite'])) checked="checked" @endif><label for="gWrite"> Write</label></div>
        <div class='octalcheckbox'><input disabled type="checkbox" name="gExecute" value="10" id="gExecute"
        @if(isset($output['gExecute'])) checked="checked" @endif><label for="gExecute"> Execute</label></div>
      </fieldset>
      <fieldset id="Other">
      <legend>Other</legend>
        <div class='octalcheckbox'><input disabled type="checkbox" name="oRead" value="4" id="oRead"
        @if(isset($output['oRead'])) checked="checked" @endif><label for="oRead"> Read</label></div>
        <div class='octalcheckbox'><input disabled type="checkbox" name="oWrite" value="2" id="oWrite"
        @if(isset($output['oWrite'])) checked="checked" @endif><label for="oWrite"> Write</label></div>
        <div class='octalcheckbox'><input disabled type="checkbox" name="oExecute" value="1" id="oExecute"
        @if(isset($output['oExecute'])) checked="checked" @endif><label for="oExecute"> Execute</label></div>
      </fieldset>
  </div>
    @endif
@stop
