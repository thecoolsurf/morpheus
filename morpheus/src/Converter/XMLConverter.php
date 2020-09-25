<?php

namespace App\Converter;

use DOMDocument;

class XMLConverter
{

    public static function xmlToArray(string $filepath): array
    {
        $result = [];
        if (file_exists($filepath)) {
            $DOM = new DOMDocument();
            $document = $DOM::load($filepath, 0);
            $datas = $document->getElementsByTagName('jobs');
            foreach ($datas as $item) {
                foreach ($item->childNodes as $nodes) {
                    $name = $nodes->nodeName;
                    $value = $nodes->nodeValue;
                    var_dump($name);
                    var_dump($value);
                    array_push($result, [
                        'name' => $name,
                        'value' => $value,
                    ]);
                }
            }
        } else {
            die('XML file not found');
        }
        var_dump($result);
        return $result;
    }

}
