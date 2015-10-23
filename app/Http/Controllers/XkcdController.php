<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;
use Illuminate\Http\Request;

class XkcdController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
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
