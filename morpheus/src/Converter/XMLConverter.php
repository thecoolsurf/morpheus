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
            $jobs = $document->getElementsByTagName('jobs');
            foreach ($jobs as $job) {
                foreach ($job->childNodes as $nodes) {
                    array_push($result, [
                        'name' => $nodes->nodeName,
                        'value' => $nodes->nodeValue,
                    ]);
                }
            }
        } else {
            die('XML file not found');
        }
        return $result;
    }

}
