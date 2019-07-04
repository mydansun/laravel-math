<?php

use Mydansun\Math\Math;

function to_number($number)
{
    return Math::convertScientificNotationToString($number);
}

function remove_end_zeros($number)
{
    return Math::removeEndZeros($number);
}

function count_decimal($number)
{
    return Math::getDecimalsLengthFromNumber($number);
}

function number_display($number, $decimals = null, $decPoint = '.', $thousandSep = ',')
{
    $number = remove_end_zeros($number);
    if (is_null($decimals)) {
        $decimals = count_decimal($number);
    }
    return number_format($number, $decimals, $decPoint, $thousandSep);
}