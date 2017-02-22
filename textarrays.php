<?php

require('tools.php');

// dropdown logic for choosing text to base password words from:
if(isset($_POST['text'])) {
	$text = $_POST['text'];
    if($text == 'alice') {
        $alice = file_get_contents("alice.txt", FILE_IGNORE_NEW_LINES |FILE_SKIP_EMPTY_LINES);
        $line = trim(preg_replace('/[^0-9a-z]+/i', ' ', $alice));
        $lines = explode(" ", $line);
        $alertType = 'alert-info';
        $results = 'You chose '.$text;
    } elseif($text == 'constitution') {
        $constitution = file_get_contents("constitution.txt", FILE_IGNORE_NEW_LINES |FILE_SKIP_EMPTY_LINES);
        $line = trim(preg_replace('/[^0-9a-z]+/i', ' ', $constitution));
        $lines = explode(" ", $line);
        $alertType = 'alert-info';
        $results = 'You chose '.$text;
    } elseif ($text == 'iliad') {
        $iliad = file_get_contents("iliad.txt", FILE_IGNORE_NEW_LINES |FILE_SKIP_EMPTY_LINES);
        $line = trim(preg_replace('/[^0-9a-z]+/i', ' ', $iliad));
        $lines = explode(" ", $line);
        $alertType = 'alert-info';
        $results = 'You chose '.$text;
    } else {
      $alertType = 'alert-danger';
      $results = 'Please choose a text.';
    }
}

// pulls value for number of words to generate from html slider
$wordnumber = $_POST['wordnumber'];

// randomizes array
shuffle($lines);

// takes slice of array at the number of words specified by the user
$generatedvalues = array_slice($lines, 0, $wordnumber);

// if isuppercase box checked, gives value of true or false (1 or 0)
if(isset($_POST['uppercase_checkbox'])) {
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

dump($password);

//$lines = array_map(function($v){
//    return explode(" ", $v);
//}, file_get_contents("constitution.txt", FILE_IGNORE_NEW_LINES |FILE_SKIP_EMPTY_LINES));
