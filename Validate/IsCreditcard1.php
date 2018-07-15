
<?php

    /*==============================================================================

    This routine checks the credit card number. The following checks are made:

    1. A number has been provided
    2. The number is a right length for the card
    3. The number has an appropriate prefix for the card
    4. The number has a valid modulus 10 number check digit if required

    If the validation fails an error is reported.

    The structure of credit card formats was gleaned from
        http://www.blackmarket-press.net/info/plastic/check_digit.htm
    where the details of other cards may also be found.

    Input parameters:
                cardnumber           number on the card
                cardname             name of card as defined in the card list below
    Output parameters:
                cardnumber           number on the card
                cardname             name of card as defined in the card list below

    Author:     John Gardner
    Date:       4th January 2005
    Updated:    26th February 2005  additional credit cards added


    if (isset($_GET['submitted'])) {
      if (checkCreditCard ($_GET['CardNumber'], $_GET['CardType'], $ccerror, $ccerrortext)) {
        $ccerrortext = 'This card has a valid format';
      }
    }

    ==============================================================================*/
/*
        function is_credit_card2 ( $ref, $cardnumber, $cardname, $errornumber = '', $errortext = '', $msg )
        {

          // Define the cards we support. You may add additional card types.

          //  Name:      As in the selection box of the form - must be same as user's
          //  Length:    List of possible valid lengths of the card number for the card
          //  prefixes:  List of possible prefixes for the card
          //  checkdigit Boolean to say whether there is a check digit

          // Don't forget - all but the last array definition needs a comma separator!

          $cards = array ( array ('name' => 'Visa',
                                  'length' => '13,16',
                                  'prefixes' => '4',
                                  'checkdigit' => true
                                 ),
                           array ('name' => 'MasterCard',
                                  'length' => '16',
                                  'prefixes' => '51,52,53,54,55',
                                  'checkdigit' => true
                                 ),
                           array ('name' => 'DinersClub',
                                  'length' => '14',
                                  'prefixes' => '300,301,302,303,304,305,36,38',
                                  'checkdigit' => true
                                 ),
                           array ('name' => 'CarteBlanche',
                                  'length' => '14',
                                  'prefixes' => '300,301,302,303,304,305,36,38',
                                  'checkdigit' => true
                                 ),
                           array ('name' => 'AmericanExpress',
                                  'length' => '15',
                                  'prefixes' => '34,37',
                                  'checkdigit' => true
                                 ),
                           array ('name' => 'Discover',
                                  'length' => '16',
                                  'prefixes' => '6011',
                                  'checkdigit' => true
                                 ),
                           array ('name' => 'JCB',
                                  'length' => '15,16',
                                  'prefixes' => '3,1800,2131',
                                  'checkdigit' => true
                                 ),
                           array ('name' => 'Enroute',
                                  'length' => '15',
                                  'prefixes' => '2014,2149',
                                  'checkdigit' => true
                                 )
                         );

          $ccErrorNo = 0;

          $ccErrors [0] = "Unknown card type";
          $ccErrors [1] = "No card number provided";
          $ccErrors [2] = "Credit card number has invalid format";
          $ccErrors [3] = "Credit card number is invalid";
          $ccErrors [4] = "Credit card number is wrong length";

          // Establish card type
          $cardType = -1;
          for ($i=0; $i<sizeof($cards); $i++) {

            // See if it is this card (ignoring the case of the string)
            if (strtolower($cardname) == strtolower($cards[$i]['name'])) {
              $cardType = $i;
              break;
            }
          }

          // If card type not found, report an error
          if ($cardType == -1) {
             $errornumber = 0;
             $errortext = $ccErrors [$errornumber];
             $this->error_msg[$ref] = $msg;
            $this->pass = false;
          }

          // Ensure that the user has provided a credit card number
          if (strlen($cardnumber) == 0)  {
             $errornumber = 1;
             $errortext = $ccErrors [$errornumber];
             $this->error_msg[$ref] = $msg;
            $this->pass = false;
          }

          // Check that the number is numeric, although we do permit a space to occur
          // every four digits.
          $cardexp = '^([0-9]{4})[[:space:]]?([0-9]{4})[[:space:]]?([0-9]{4})[[:space:]]?([0-9]{1,4})$';
          if (!ereg($cardexp,$cardnumber, $matches))  {
             $errornumber = 2;
             $errortext = $ccErrors [$errornumber];
             $this->error_msg[$ref] = $msg;
            $this->pass = false;
          }

          // Now remove any spaces from the credit card number
          $cardNo = $matches[1] . $matches[2] . $matches[3] . $matches[4];

          // Now check the modulus 10 check digit - if required
          if ($cards[$cardType]['checkdigit']) {
            $checksum = 0;                                  // running checksum total
            $mychar = "";                                   // next char to process
            $j = 1;                                         // takes value of 1 or 2

            // Process each digit one by one starting at the right
            for ($i = strlen($cardNo) - 1; $i >= 0; $i--) {

              // Extract the next digit and multiply by 1 or 2 on alternative digits.
              $calc = $cardNo{$i} * $j;

              // If the result is in two digits add 1 to the checksum total
              if ($calc > 9) {
                $checksum = $checksum + 1;
                $calc = $calc - 10;
              }

              // Add the units element to the checksum total
              $checksum = $checksum + $calc;

              // Switch the value of j
              if ($j ==1) {$j = 2;} else {$j = 1;};
            }

            // All done - if checksum is divisible by 10, it is a valid modulus 10.
            // If not, report an error.
            if ($checksum % 10 != 0) {
             $errornumber = 3;
             $errortext = $ccErrors [$errornumber];
             $this->error_msg[$ref] = $msg;
            $this->pass = false;
            }
          }

          // The following are the card-specific checks we undertake.

          // Load an array with the valid prefixes for this card
          $prefix = split(',',$cards[$cardType]['prefixes']);

          // Now see if any of them match what we have in the card number
          $PrefixValid = false;
          for ($i=0; $i<sizeof($prefix); $i++) {
            $exp = '^' . $prefix[$i];
            if (ereg($exp,$cardNo)) {
              $PrefixValid = true;
              break;
            }
          }

          // If it isn't a valid prefix there's no point at looking at the length
          if (!$PrefixValid) {
             $errornumber = 3;
             $errortext = $ccErrors [$errornumber];
             $this->error_msg[$ref] = $msg;
            $this->pass = false;
          }

          // See if the length is valid for this card
          $LengthValid = false;
          $lengths = split(',',$cards[$cardType]['length']);
          for ($j=0; $j<sizeof($lengths); $j++) {
            if (strlen($cardNo) == $lengths[$j]) {
              $LengthValid = true;
              break;
            }
          }

          // See if all is OK by seeing if the length was valid.
          if (!$LengthValid) {
             $errornumber = 4;
             $errortext = $ccErrors [$errornumber];
             $this->error_msg[$ref] = $msg;
            $this->pass = false;
          };

          // The credit card is in the required format.
          return true;
        }
*/
?>
        