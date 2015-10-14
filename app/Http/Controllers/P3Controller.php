<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;

class P3Controller extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /welcome index page
    */
    public function getIndex() {
        return view('welcome');
    }

    /**
     * Responds to requests to GET /lorem-ipsum's generator page
     */
    public function getLoremGenerator() {
        return view('loremipsum.lorem');
    }
    /**
     * Responds to requests to POST /lorem-ipsum's generator page
     */
    public function postLoremGenerator() {
        return view('loremipsum.lorem');
    }
    /**
     * Responds to requests to GET /user-generator's generator page
     */
    public function getUserGenerator() {
        return view('usergenerator.user');
    }
    /**
     * Responds to requests to POST /user-generator's generator page
     */
    public function postUserGenerator() {
        return view('usergenerator.user');
    }

    /**
     * Responds to requests to POST /octal-decoder's tool page
     */
    public function getOctalDecoder() {
        return view('octaldecoder.octal');
    }
    /**
     * Responds to requests to POST /octal-decoder's tool page
     */
    public function postOctalDecoder() {
        return view('octaldecoder.octal');
    }
    /**
     * Responds to requests to GET /color-picker's tool page
     */
     public function getColorPicker() {
         return view('colorpicker.color');
     }
     /**
      * Responds to requests to POST /color-picker's tool page
      */
      public function postColorPicker() {
          return view('colorpicker.color');
      }
      /**
       * Responds to requests to GET /color-picker's tool page
       */
       public function getXkcdGenerator() {
           return view('xkcdgenerator.xkcd');
       }
       /**
        * Responds to requests to POST /color-picker's tool page
        */
        public function postXkcdGenerator() {
            return view('xkcdgenerator.xkcd');
        }
}
