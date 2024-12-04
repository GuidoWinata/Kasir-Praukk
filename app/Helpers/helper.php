<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('formatRupiah')) {
    function formatRupiah($angka, $withPrefix = true)
    {
        $formatted = number_format($angka, 0, ',', '.');
        return $withPrefix ? 'Rp' . $formatted : $formatted;
    }
}

function tempatID(): int
{
    return (int) session("tempat_id");
}

function userID(): int
{
    return Auth::user()->id;
}