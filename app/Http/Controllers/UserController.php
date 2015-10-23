<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
            
            return view('usergenerator.user');
        }
  }
