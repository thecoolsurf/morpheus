<?php
// src/Hook/JobHook.php

namespace App\Hook;

use App\Validator\Api;

class JobHook
{
    
    public function formatAd(array $ad): array
    {
        $api = new Api();
        $check = $api->check($ad, 'job');
        return $check;
    }

    public function buildDescription()
    {
        // ...
    }
    
}
