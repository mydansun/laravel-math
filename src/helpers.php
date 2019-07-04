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

function number_display($number, $decPoint = '.', $thousandSep = ',')
{
    $number = remove_end_zeros($number);
    return number_format($number, count_decimal($number), $decPoint, $thousandSep);
}