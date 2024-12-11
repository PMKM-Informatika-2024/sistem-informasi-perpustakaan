<?php

use Illuminate\Support\Carbon;

if (!function_exists('rupiah')) {
    function rupiah(int $value): string
    {
        $formatter = NumberFormatter::create('id_ID', NumberFormatter::CURRENCY);
        $formatter->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, 0);

        return $formatter->format($value);
    }
}

if (!function_exists('calculateFine')) {
    function calculateFine(Carbon $dueDate, Carbon $returnDate): int
    {
        if ($returnDate->greaterThan($dueDate)) {
            $diff = $dueDate->diffInDays($returnDate);

            return $diff * 1000;
        }

        return 0;
    }
}
