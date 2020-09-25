<?php

namespace App\Converter;

class JSONConverter
{
    
    public static function jsonToArray(string $filepath): array
    {
        $result = [];
        if (file_exists($filepath)) {
            $json = file_get_contents($filepath);
            $result = json_decode($json,true);
//            var_dump($result);
        } else {
            die('JSON file not found');
        }
        return $result;
    }
    
}
