<?php

namespace JL;

class TextWordArray
{
    public $generatedvalues;

    public function MakeArray($text)
    {
        $textscan = file_get_contents($text, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $text_sans_punctuation = trim(preg_replace('/[^0-9a-z]+/i', ' ', $textscan));
        $text_array = explode(" ", $text_sans_punctuation);

        return $text_array;
    }
}
