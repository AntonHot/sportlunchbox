<?php

namespace App\Helpers;

class RationDate
{
    const FORMAT = 'Y-m-d';

    public static function today() {
        return date(self::FORMAT);
    }
}
