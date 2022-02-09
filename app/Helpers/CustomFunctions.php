<?php

if (!function_exists('amount_format')) {
    function amount_format($amount)
    {
        return number_format((int)$amount, 0, ",", ".").' UZS';
    }
}