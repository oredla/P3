<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Color;

class ColorController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
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
        $color = new Color();
        // fromRgbInt() returns the colors in HEX value
        $converted = $color->fromRgbInt($request['Red'], $request['Green'], $request['Blue']);
        return view('colorpicker.color')->with('converted', $converted);
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
            $color = new Color();
            $color->fromHex($request['hexcolor']);
            // toRgbInt() returns the colors separated in RED, GREEN, BLUE in an array.
            $converted = $color->toRgbInt();
            //add it to an Array to return to view
            $colorlist['color'] = $color;
            $colorlist['converted'] = $converted;
            return view('colorpicker.picker')->with('colorlist', $colorlist);
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
            $color = new Color();
            $color->fromHex($request['hexcolor']);
            // toRgbInt() returns the colors separated in RED, GREEN, BLUE in an array.
            $converted = $color->toRgbInt();
            //add it to an Array to return to view
            $colorlist['color'] = $color;
            $colorlist['converted'] = $converted;
              return view('colorpicker.hex')->with('colorlist', $colorlist);
          }
}
