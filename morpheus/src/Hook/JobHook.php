<?php
// src/Hook/JobHook.php

namespace App\Hook;

class JobHook
{
    
    public function formatAd(array $ad): array
    {
        $search = ["    ","   ","  "," :","\n\n\n","\n\n"];
        $replace = ["","","\n"," :\n","\n",];
        $value = str_replace($search, $replace, $ad);
        return $value;
    }

    public function buildDescription()
    {
        // ...
    }
    
}
