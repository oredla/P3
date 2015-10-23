<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }
    ###############################################################################
    ### Permission Calculator
    ###############################################################################
        /**
         * Responds to requests to POST /octal-encoder's tool page
         */
        public function getOctalEncoder() {
            return view('permissioncalc.encoder');
        }
        /**
         * Responds to requests to POST /octal-encoder's tool page
         */
        public function postOctalEncoder(Request $request) {
            // initiate the value for $octal as 0
            $octal = 0;
            // this foreach loop will add the value of all of the checked boxes to generate the octal number
            foreach($_POST as $key => $value){
              if($key != '_token'){ //this will exclude the _token to be added to the notation total. 
                $octal = $octal + $value;
              }
            }
            return view('permissioncalc.encoder')->with('octal', $octal);
        }
        /**
         * Responds to requests to get /octal-decoder's tool page
         */
        public function getOctalDecoder() {
            return view('permissioncalc.decoder');

        }
        /**
         * Responds to requests to POST /octal-decoder's tool page
         */
        public function postOctalDecoder(Request $request) {
            // Validate the request data: loreminput
            $this->validate($request,
              ['notation' => 'required|digits:4']
            );
            // LOGIC CALCULATION begins
            $octal = $request['notation'];
            // this array stores all the names of the permission
            $permissionsNAMES = array (
                  0  => array('setuid', 'setgid', 'stickybit'),
                  1  => array('uRead', 'uWrite', 'uExecute'),
                  2  => array('gRead', 'gWrite', 'gExecute'),
                  3  => array('oRead', 'oWrite', 'oExecute')
                );
            $output['initialize']=0;
            for($i = 0; $i < 4; $i++){
              $digit = substr($octal, $i, 1);
              switch ($digit) {
                  case 7:
                      // set flag bit for ALL
                      $output[$permissionsNAMES[$i][0]] = 'y';
                      $output[$permissionsNAMES[$i][1]] = 'y';
                      $output[$permissionsNAMES[$i][2]] = 'y';
                      break;
                  case 6:
                      // set flag bit for READ & WRITE
                      $output[$permissionsNAMES[$i][0]] = 'y';
                      $output[$permissionsNAMES[$i][1]] = 'y';
                      break;
                  case 5:
                      // set flag bit for READ & EXECUTE
                      $output[$permissionsNAMES[$i][0]] = 'y';
                      $output[$permissionsNAMES[$i][2]] = 'y';
                      break;
                  case 4:
                      // set flag bit for READ
                      $output[$permissionsNAMES[$i][0]] = 'y';
                      break;
                  case 3:
                      // set flag bit for WRITE & EXECUTE
                      $output[$permissionsNAMES[$i][1]] = 'y';
                      $output[$permissionsNAMES[$i][2]] = 'y';
                      break;
                  case 2:
                      // set flag bit for WRITE
                      $output[$permissionsNAMES[$i][1]] = 'y';
                      break;
                  case 1:
                      // set flag bit for EXECUTE
                      $output[$permissionsNAMES[$i][2]] = 'y';
                      break;

              }
            }
            // Logical Calculation ends
            return view('permissioncalc.decoder')->with('output', $output);
        }

  }
