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

}
