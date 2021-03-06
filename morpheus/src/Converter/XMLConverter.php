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
            foreach ($datas as $items) {
                foreach ($items->childNodes as $nodes) {
                    if (!in_array($nodes->nodeValue, ['job']) && $nodes->nodeName == 'job') {
                        array_push($result, [
                            'name' => $nodes->nodeName,
                            'value' => $nodes->nodeValue,
                        ]);
                    }
                }
            }
        } else {
            die('XML file not found');
        }
        return $result;
    }

}
