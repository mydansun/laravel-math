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