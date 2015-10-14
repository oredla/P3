@extends('layouts.master')


@section('title')
    Random User Generator
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')

@stop


@section('content')
  <div class='form'>
    <form method="POST" class="form-inline">
        How many users do you want? (Max: 99)
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="number" class="form-control" name="userinput" min="1" max="99" value="5">
        <br><br>
        Optional information to generate: (Please check all the ones you want)
        <br>
        <ul class="formUL">
              <li><input type="checkbox" name="Birthdate"> Birthdate </li>
              <li><input type="checkbox" name="Profile"> Profile </li>
              <li><input type="checkbox" name="Address"> Address </li>
              <li><input type="checkbox" name="Phone"> Phone Number </li>
              <li><input type="checkbox" name="Email"> Email</li>
            </ul>
        <br>Bonus Feature: <input type="checkbox" name="Color"> Random Color
        <br><br>
        <button type="submit" class="btn btn-primary">Generate</button>
      </form>
    </div>
    <hr class='formHR'>
      @if(isset($_POST['userinput']))
          <div class='output'>
          <?php
          $faker = Faker\Factory::create();
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
            </ul>
            <hr class='outputSeparator'>
          <?php } ?>
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
