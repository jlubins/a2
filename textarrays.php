<?php

require('tools.php');
require('Form.php');
require('TextWordArray.php');

use DWA\Form;
use JL\TextWordArray;

$form = new Form($_POST);
$textwordarray = new TextWordArray($text);
$text = $form->get('text');
$wordnumber = $_POST['wordnumber'];
$uppercase = $form->isChosen('uppercase_checkbox');
$inclnumber = $form->isChosen('incl_number_checkbox');

if ($text != 'choose') {
    $textarray = $textwordarray->MakeArray($text);
    shuffle($textarray);
    $generatedvalues = array_slice($textarray, 0, $wordnumber);
    if ($uppercase) {
        foreach ($generatedvalues as $keyval => $value) {
            $generatedvalues[$keyval] = ucwords($generatedvalues[$keyval]);
        }
    } else {
        foreach ($generatedvalues as $keyval => $value) {
            $generatedvalues[$keyval] = strtolower($generatedvalues[$keyval]);
        }
    }
    if ($inclnumber) {
        $generatednumber = mt_rand(0, 99);
        array_push($generatedvalues, $generatednumber);
    }
    $password = join('-', $generatedvalues);
} else {
    $alertType = 'alert-danger';
    $password = 'Please choose a text.';
}
