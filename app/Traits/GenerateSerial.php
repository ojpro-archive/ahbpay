<?php

namespace App\Traits;

use App\Models\Transaction;

class GenerateSerial
{
    public static function generateSerailNumber()
    {
        $number = mt_rand(1000000000, 9999999999); // better than rand()

        // call the same function if the Serail exists already
        if (self::serailNumberExists($number)) {
            return self::generateSerailNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
    }

    private static function serailNumberExists($number)
    {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Transaction::where('serial', $number)->exists();
    }
}
