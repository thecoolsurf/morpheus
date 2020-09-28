<?php

namespace App\Converter;

class JSONConverter
{
    
    public static function jsonToArray(string $filepath): array
    {
        $result = [];
        if (file_exists($filepath)) {
            $json = file_get_contents('./data/real_estate.json');
            $result = json_decode($json,true);
        } else {
            die('JSON file not found');
        }
        return $result;
    }
    
}
