<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;
use Illuminate\Http\Request;

class P3Controller extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }
###############################################################################
### index
###############################################################################
    /**
    * Responds to requests to GET /welcome index page
    */
    public function getIndex() {
        return view('welcome');
    }
###############################################################################
### Lorem Ipsum
###############################################################################
    /**
     * Responds to requests to GET /lorem-ipsum's generator page
     */
    public function getLoremGenerator() {
        return view('loremipsum.lorem');
    }
    /**
     * Responds to requests to POST /lorem-ipsum's generator page
     */
    public function postLoremGenerator(Request $request) {
        // Validate the request data: loreminput
        $this->validate($request,
          ['loreminput' => 'required|integer|min:1|max:99']
        );
        return view('loremipsum.lorem');
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
        return view('usergenerator.user');
    }

###############################################################################
### Permission Calculator
###############################################################################
    /**
     * Responds to requests to POST /octal-decoder's tool page
     */
    public function getOctalEncoder() {
        return view('permissioncalc.encoder');
    }
    /**
     * Responds to requests to POST /octal-decoder's tool page
     */
    public function postOctalEncoder(Request $request) {
        return view('permissioncalc.encoder');
    }
    /**
     * Responds to requests to POST /octal-decoder's tool page
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
        return view('permissioncalc.decoder');
    }

###############################################################################
### Color Picker
###############################################################################
    /**
     * Responds to requests to GET /color-picker's tool page
     */
     public function getColorPickerValue() {
         return view('colorpicker.color');
     }
     /**
      * Responds to requests to POST /color-picker's tool page
      */
      public function postColorPickerValue(Request $request) {
        // Validate the request data
        $this->validate($request,
          [
            'Red' => 'required|integer|max:255|min:0',
            'Green' => 'required|integer|max:255|min:0',
            'Blue' => 'required|integer|max:255|min:0',
          ]
        );

          return view('colorpicker.color');
      }
      /**
       * Responds to requests to GET /color-picker's tool page
       */
       public function getColorPickerPick() {
           return view('colorpicker.picker');
       }
       /**
        * Responds to requests to POST /color-picker's tool page
        */
        public function postColorPickerPick(Request $request) {
          // Validate the request data: hexcolor
          $this->validate($request,
            [
              'hexcolor' => 'required|max:7|hexcolor',
            ]
          );
            return view('colorpicker.picker');
        }
        /**
         * Responds to requests to GET /color-picker's tool page
         */
         public function getColorPickerHEX() {
             return view('colorpicker.hex');
         }
         /**
          * Responds to requests to POST /color-picker's tool page
          */
          public function postColorPickerHEX(Request $request) {
            // Validate the request data
            $this->validate($request,
              [
                'hexcolor' => 'required|min:6|max:6|hexcolor',
              ]
            );
              return view('colorpicker.hex');
          }

###############################################################################
### xkcd Password Generator
###############################################################################
      /**
       * Responds to requests to GET /color-picker's tool page
       */
       public function getXkcdGenerator() {
           return view('xkcdgenerator.xkcd');
       }
       /**
        * Responds to requests to POST /color-picker's tool page
        */
        public function postXkcdGenerator(Request $request) {
            // Validate the request data
            $this->validate($request,
              [
                'wordCount' => 'required|integer|max:9|min:1',
                'addSeparator' => 'required|in:-,.,*,^,%,$,@,!'
              ]
            );
            return view('xkcdgenerator.xkcd');
        }
}
