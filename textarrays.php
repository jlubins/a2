<?php

require('tools.php');

// dropdown logic for choosing text to base password words from:
$lines = array();
if(isset($_POST['text'])) {
	$text = $_POST['text'];
    if($text = 'choose') {
        $alertType = 'alert-danger';
        $results = 'Please choose a text.';
    } elseif($text = 'alice') {
        $lines = array_map(function($v){
          return explode(" ", $v);
        }, file("alice.txt", FILE_IGNORE_NEW_LINES |FILE_SKIP_EMPTY_LINES));
        $alertType = 'alert-info';
        $results = 'You chose '.$text;
    } elseif($text = 'constitution') {
        $lines = array_map(function($v){
            return explode(" ", $v);
        }, file("constitution.txt", FILE_IGNORE_NEW_LINES |FILE_SKIP_EMPTY_LINES));
        $alertType = 'alert-info';
        $results = 'You chose '.$text;
    } elseif($text = 'iliad') {
        $lines = array_map(function($v){
            return explode(" ", $v);
        }, file("iliad.txt", FILE_IGNORE_NEW_LINES |FILE_SKIP_EMPTY_LINES));

        $alertType = 'alert-info';
        $results = 'You chose '.$text;
    }
}

// pulls value for number of words to generate from html slider
$wordnumber = $_POST['wordnumber'];

// creates array of values from chosen text + wordnumber slider
$generatedvalues = array_rand ($lines, $wordnumber);

// if isuppercase box checked, gives value of true or false (1 or 0)
if(isset($_POST['uppercase_checkbox']) && $_POST['uppercase_checkbox'] = "isuppercase") {
  $isuppercase = 1;
}
else {
  $isuppercase = 0;
}

// if uppercase checkbox is TRUE, uppercase the first letter of each generated word
if($isuppercase = 1){
  foreach($generatedvalues as $keyval => $value){
    $generatedvalues[$keyval] = ucwords($generatedvalues[$keyval]);
  }
}

// if include number checkbox is TRUE, generate pseudorandom number and append to the end of password array
if(isset($_POST['incl_number_checkbox']) && $_POST['incl_number_checkbox'] = "incl_number") {
  $generatednumber = mt_rand(0, 99);
  array_push($generatedvalues, $generatednumber);
}

// join the generated values (and potentially number) with dashes as password output
$password = join('-', $generatedvalues);

dump($lines);
