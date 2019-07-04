<?php

use Mydansun\Math\Math;

function to_number($number)
{
    return Math::convertScientificNotationToString($number);
}

function remove_end_zeros($amount)
{
    return Math::removeEndZeros($amount);
}