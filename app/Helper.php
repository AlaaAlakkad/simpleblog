<?php

namespace App;

class Helper
{
    static function formatDate(string $string){
        $formatedDate = date('M j, Y h:ia', strtotime($string));
        return $formatedDate;
    }

    static function formatLongStrings(string $htmlString){
        $string = strip_tags($htmlString);
        return strlen($string) > 50 ? substr($string, 0, 50) . "...": substr($string, 0, 50);
    }

    static function formatDateForTable(string $string){
        $formatedDate = date('M j, Y', strtotime($string));
        return $formatedDate;
    }
}