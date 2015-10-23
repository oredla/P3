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
          $WordList = $this->wordScarpper();
          $password = $this->XKCD($WordList);
          $output['password'] = $password;
          $output['howSecure'] = $this->HowSecureIsMyPassword($password)['howSecure'];
          $output['howSecureColor'] = $this->HowSecureIsMyPassword($password)['howSecureColor'];
          $output['howSecurePrecentage'] = $this->HowSecureIsMyPassword($password)['howSecurePrecentage'];
          return view('xkcdgenerator.xkcd')->with('output',$output);
      }

      /**
      * #####################################
      * Function to scrap the word list files
      * #####################################
      */
      private function wordScarpper(){
          $WordList = Array('about', 'could', 'apple', 'orange', 'banana', 'get', 'zoo');
          $output = Array();
          $input = Array();
          for($j = 1; $j <= 5; $j=$j+2){
              $URL1 = '0' . $j;
              $URL2 = '0' . strval($j+1);
              $scraper_URL = 'http://www.paulnoll.com/Books/Clear-English/words-' . $URL1 . '-' . $URL2 . '-hundred.html';
              $input = file_get_contents($scraper_URL);
              preg_match_all("/<li>(.*?)<\/li>/s", $input, $output, PREG_SET_ORDER);
              for($i = 0; $i < count($output); $i++){
                  array_push($WordList, trim($output[$i][1]));
              }
          }
          return $WordList;
      }
      /**
      * #####################################
      * Function to generate the XKCD Password
      * #####################################
      */
      private function XKCD($WordList){
        #Variables
        $password = '';
        $UserInput = Array();
        $usedNum = Array();

        #constants
        $WORD_COUNT = 'wordCount';
        $ADD_SEPARATOR = 'addSeparator';

        # Use a foreach loop to loop through the User Inputs array
        foreach($_POST as $key => $value) {
            $UserInput[$key] = $value;
        } # End of FOREACH loop

        #a for loop for the total numbers of WORDS user requested ($wordCount)
        for($i = 0; $i < $UserInput[$WORD_COUNT]; $i++){
            #use php rand() to generate a number from 0 to total number of $WordList - 1.
            $randNum = rand(0,count($WordList)-1);
            #use a while loop to generate unique randNum.
            while(true){
                #test if the rand() is already in the array $usedNum
                if(in_array($randNum, $usedNum)){
                    #this is to regenerate number when $randNum is already used in $usedNum
                    $randNum = rand(0,count($WordList)-1);
                }
                #take action will occur when $randNum is new.
                else{
                    #record the $randNum as used in the array $usedNum
                    array_push($usedNum, $randNum);
                    #add a new word to the STRING $password from the ARRAY $WordList
                    $password = $password . $WordList[$randNum];
                    #only add a separator when we are NOT at the very end
                    if ($i < $UserInput[$WORD_COUNT] -1){
                        $password = $password . $UserInput[$ADD_SEPARATOR];
                    }
                    #break out of the while loop
                    break;
                } #End of IF loop
            } #End of WHILE loop
        } # End of FOR loop

        return $this->addNumSym($UserInput, $password);
      }
      /**
      * #####################################
      * Function to add Number or Symbol to the XKCD Password as user requested
      * #####################################
      */
      private function addNumSym($UserInput, $password){
        #variables
        $SymbolList = Array('!', '@', '$', '%', '^', '*', '.', '-');

        #constants
        $ADD_NUMBER = 'addNumber';
        $ADD_SYMBOL = 'addSymbol';
        $IT_IS_ON = 'on';

        #add a number to $password if user selected $addNumber.
        if (array_key_exists($ADD_NUMBER, $UserInput)){
            #check if #addNumber == 'on' ($itIsON)
            if($UserInput[$ADD_NUMBER] == $IT_IS_ON){
                $randNum = rand(0,9);
                $password = $password . $randNum;
            }//end IF loop
        } //end IF loop

        #add a symbol if user selected $addSymbol
        if (array_key_exists($ADD_SYMBOL, $UserInput)){
            #check if #$addSymbol == 'on' ($itIsON)
            if($UserInput[$ADD_SYMBOL] == $IT_IS_ON){
                $randNum = rand(0,count($SymbolList)-1);
                $password = $password . $SymbolList[$randNum];
                #debug print the values of $randNum & $password
                //echo $randNum . ' | ' . $password . ' || <br>';
            }//end IF loop
        }//end IF loop

        return $password;
      }
      /**
      * #####################################
      * Function to Calculate how secure is my password?
      * (using the xkcd example of 1000 guess/second.)
      * #####################################
      */
      private function HowSecureIsMyPassword($password){
          #Variables init for "How Secure is My Password?"
          $LENGTH_OF_PASSWORD = '';
          $howSecureTime = '';
          $howSecureColor = '';
          $howSecurePrecentage = 0;
          $returnText = '';
          $returnArray = Array();

          #constants
          $GUESS_PER_SECOND = 1000;
          $LENGTH_OF_PASSWORD = strlen($password);

          if ($LENGTH_OF_PASSWORD > 0){
                $howSecureTime = pow(2, $LENGTH_OF_PASSWORD);

                $returnText = "The Length of Password: " . $LENGTH_OF_PASSWORD . ". It'll take ";

                if ($howSecureTime / $GUESS_PER_SECOND / 60 < 60){
                    $howSecureTime = round($howSecureTime / $GUESS_PER_SECOND / 60, 2);
                    $unit = " minute(s)";
                    $howSecureColor = 0;
                }
                elseif ($howSecureTime / $GUESS_PER_SECOND / 3600 < 24){
                    $howSecureTime = round($howSecureTime / $GUESS_PER_SECOND / 3600, 2);
                    $unit = " hour(s)";
                    $howSecureColor = 0.2;
                }
                elseif ($howSecureTime / $GUESS_PER_SECOND / (3600*24) < 30){
                    $howSecureTime = round($howSecureTime / $GUESS_PER_SECOND / (3600*24), 2);
                    $unit = " day(s)";
                    $howSecureColor = 0.5;
                }
                elseif ($howSecureTime / $GUESS_PER_SECOND / (3600*24*30) < 12){
                    $howSecureTime = round($howSecureTime / $GUESS_PER_SECOND / (3600*24*30), 2);
                    $unit = " month(s)";
                    $howSecureColor = 0.7;
                }
                else{
                    $howSecureTime = round($howSecureTime / $GUESS_PER_SECOND / (3600*24*365), 2);
                    $unit = " year(s)";
                    $howSecureColor = $howSecureTime / 3;
                }

                $returnText = $returnText . $howSecureTime . $unit . " at " . $GUESS_PER_SECOND . " guesses/second to guess this password.";


                if ($howSecureColor >= 0.8) {
                    $howSecureColor = "progress-bar-success";
                    $howSecurePrecentage = '100';
                } elseif ($howSecureColor >= 0.3) {
                    $howSecureColor = "progress-bar-warning";
                    $howSecurePrecentage = '70';
                } else {
                    $howSecureColor = "progress-bar-danger";
                    $howSecurePrecentage = '50';
                }
                $returnArray['howSecure'] = $returnText;
                $returnArray['howSecureColor'] = $howSecureColor;
                $returnArray['howSecurePrecentage'] = $howSecurePrecentage;

            }// end IF loop for How Secure is my Password?
            return $returnArray;
        }

  }
