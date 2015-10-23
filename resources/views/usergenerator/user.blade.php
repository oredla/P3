@extends('layouts.master')

@section('title')
    Random User Generator
@stop

@section('form')
  <form method="POST" action="/user-generator" class="form-inline">
    How many users do you want? (Max: 99)
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="number" class="form-control" name="userinput" min="1" max="99" value= {{{ $_POST['userinput'] or 5 }}}>
    <br><br>
    Optional information to generate: (Please check all the ones you want)
    <br>
    <ul class="formUL">
          <li><label for="Birthdate"><input type="checkbox" name="Birthdate" id="Birthdate"
            @if(isset($_POST['Birthdate'])) checked="checked" @endif> Birthdate </label></li>
          <li><label for="Profile"><input type="checkbox" name="Profile" id="Profile"
            @if(isset($_POST['Profile'])) checked="checked" @endif> Profile </label></li>
          <li><label for="Address"><input type="checkbox" name="Address" id="Address"
            @if(isset($_POST['Address'])) checked="checked" @endif> Address </label></li>
          <li><label for="Phone"><input type="checkbox" name="Phone" id="Phone"
            @if(isset($_POST['Phone'])) checked="checked" @endif> Phone Number </label></li>
          <li><label for="Email"><input type="checkbox" name="Email" id="Email"
            @if(isset($_POST['Email'])) checked="checked" @endif> Email</label></li>
          <li><label for="Password"><input type="checkbox" name="Password" id="Password"
            @if(isset($_POST['Password'])) checked="checked" @endif> Password</label></li>
        </ul>
    <br>Bonus Feature: <label for="Color"><input type="checkbox" name="Color" id="Color"
            @if(isset($_POST['Color'])) checked="checked" @endif> Random Color</label>
    <br><br>
    <button type="submit" class="btn btn-primary">Generate</button>
  </form>
@stop

@section('content')
      @if(isset($_POST['_token']))
        <div class='output'>
          <?php
          // generate data by accessing properties
          for ($i=0; $i < $_POST['userinput']; $i++) {
            ?>
            <ul
              {{-- this if statement will change the color of each individual
              person's profile when user checked off COLOR --}}
              @if(isset($_POST['Color']))
                <?= "style='color:" . $faker->hexcolor . "'" ?>
              @endif
              >
              <li>
                {{-- 1st item of the list is NAME, given a H4 header --}}
                <h4><?php echo $faker->name;?> </h4>
              </li>

              {{-- if statement to test for BIRTHDATE --}}
              @if(isset($_POST['Birthdate']))
                <li>Date of Birth: <?= $faker->dateTimeThisCentury->format('Y-m-d') ?></li>
              @endif
              {{-- if statement to test for PHONE --}}
              @if(isset($_POST['Phone']))
                <li>Phone#: <?= $faker->phoneNumber ?></li>
              @endif
              {{-- if statement to test for ADDRESS --}}
              @if(isset($_POST['Address']))
                <li>Address: <?= $faker->address ?></li>
              @endif
              {{-- if statement to test for EMAIL --}}
              @if(isset($_POST['Email']))
                <li>Email: <?= $faker->email ?></li>
              @endif
              {{-- if statement to test for PROFILE --}}
              @if(isset($_POST['Profile']))
                <li>Profile: <?= $faker->text ?></li>
              @endif
              {{-- if statement to test for PASSWORD --}}
              @if(isset($_POST['Password']))
                <li>Password: <?= $faker->password ?></li>
              @endif
            </ul>
            <hr class='outputSeparator'>
          <?php } ?>
        </div>
      @endif

@stop
