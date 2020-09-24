<?php
// src/Hook/RealEstateHook.php

namespace App\Hook;

use App\Validator\Api;

class RealEstateHook
{
    
    public function formatAd(array $ad): array
    {
        $api = new Api();
        $check = $api->check($ad, 'real_estate');
        return $check;
    }

    public function buildDescription()
    {
        // ...
    }
    
}
