<?php

namespace App\Http\Helpers;

class Helper
{
    public static function format_price($price)
    {
        $price = str_replace( ',', '', $price );

        if($price > 1)
        {
            $formatted_price = number_format($price, 2);
        } else if($price < 1) {
            $formatted_price = number_format($price, 3);
        } else if($price < 0.1) {
            $formatted_price = number_format($price, 4);
        } else if($price < 0.01) {
            $formatted_price = number_format($price, 5);
        } else if($price < 0.001) {
            $formatted_price = number_format($price, 6);
        }else {
            $formatted_price = $price;
        }

        return $formatted_price;
    }

    public static function human_read_val($n, $precision = 3) {
        $n = str_replace( ',', '', $n );
        if ($n < 1000000) {
            // Anything less than a million
            $n_format = number_format($n);
        } else if ($n < 1000000000) {
            // Anything less than a billion
            $n_format = number_format($n / 1000000, $precision) . 'M';
        } else {
            // At least a billion
            $n_format = number_format($n / 1000000000, $precision) . 'B';
        }

        return $n_format;
    }
}