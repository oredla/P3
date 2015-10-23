<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Faker;

class UserController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }
    ###############################################################################
    ### Random User Generator
    ###############################################################################
        /**
         * Responds to requests to GET /user-generator's generator page
         */
        public function getUserGenerator() {
            return view('usergenerator.user');
        }
        /**
         * Responds to requests to POST /user-generator's generator page
         */
        public function postUserGenerator(Request $request) {
            // Validate the request data: userinput
            $this->validate($request,
              ['userinput' => 'required|integer|min:1|max:99']
            );
            $faker = Faker\Factory::create();
            $fakerArray['init'] = $request['userinput'];

            //generating the values for each of the requested items for each faker
            for ($i=0; $i <= $request['userinput']; ++$i) {
              // 1st item of the list is NAME, given a H4 header
              $fakerArray[$i]['Name'] = $faker->name;

              // this if statement will change the color of each individual
              // person's profile when user checked off COLOR
              if(isset($request['Color'])){
                $fakerArray[$i]['Color'] = $faker->hexcolor;
              }
              // if statement to test for BIRTHDATE
              if(isset($request['Birthdate'])){
                $fakerArray[$i]['Birthdate'] = $faker->dateTimeThisCentury->format('Y-m-d');
              }
              // if statement to test for PHONE
              if(isset($request['Phone'])) {
                $fakerArray[$i]['Phone'] = $faker->phoneNumber;
              }
              // if statement to test for ADDRESS
              if(isset($request['Address'])){
                $fakerArray[$i]['Address'] = $faker->address;
              }
              //if statement to test for EMAIL
              if(isset($request['Email'])){
                $fakerArray[$i]['Email'] = $faker->email;
              }
              // if statement to test for PROFILE
              if(isset($request['Profile'])){
                $fakerArray[$i]['Profile'] = $faker->text;
              }
              // if statement to test for PASSWORD
              if(isset($request['Password'])){
                $fakerArray[$i]['Password'] = $faker->password;
              }
            }
            return view('usergenerator.user')->with('fakerArray', $fakerArray);

        }
  }
