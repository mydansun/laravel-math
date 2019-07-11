<?php

namespace Mydansun\Math;

use BCMathExtended\BC;

class Math extends BC
{

    public static function gt($left, $right, $scale = null)
    {
        if (is_null($scale)) {
            return static::comp($left, $right) === 1;
        } else {
            return static::comp($left, $right, $scale) === 1;
        }
    }

    public static function gte($left, $right, $scale = null)
    {
        if (is_null($scale)) {
            return static::comp($left, $right) >= 0;
        } else {
            return static::comp($left, $right, $scale) >= 0;
        }
    }

    public static function lt($left, $right, $scale = null)
    {
        if (is_null($scale)) {
            return static::comp($left, $right) === -1;
        } else {
            return static::comp($left, $right, $scale) === -1;
        }
    }

    public static function lte($left, $right, $scale = null)
    {
        if (is_null($scale)) {
            return static::comp($left, $right) <= 0;
        } else {
            return static::comp($left, $right, $scale) <= 0;
        }
    }

    public static function eq($left, $right, $scale = null)
    {
        if (is_null($scale)) {
            return static::comp($left, $right) === 0;
        } else {
            return static::comp($left, $right, $scale) === 0;
        }
    }

    public static function roundUp($number, $precision = 0)
    {
        $number = self::convertScientificNotationToString($number);
        $multiply = self::pow('10', (string)abs($precision));

        return $precision < 0
            ?
            self::mul(
                self::up(self::div($number, $multiply, self::getDecimalsLengthFromNumber($number))), $multiply,
                $precision
            )
            :
            self::div(
                self::up(self::mul($number, $multiply, self::getDecimalsLengthFromNumber($number))), $multiply,
                $precision
            );
    }

    public static function absUp($number, $precision = 0)
    {
        return parent::roundUp($number, $precision);
    }

    protected static function up($number)
    {
        if (($index = strpos($number, '.')) !== false && $index + 1 < strlen($number)) {
            $digit = intval(substr($number, $index + 1, 1));
            if ($digit > 0) {
                $number = self::add($number, 1, 0);
            }
        }
        return static::floor($number);
    }

    public static function removeEndZeros($number)
    {
        $number = static::convertScientificNotationToString($number);
        if (false !== strpos($number, '.')) {
            $number = rtrim($number, '0');
        }
        return rtrim($number, '.') ?: '0';
    }

    public static function getDecimalsLengthFromNumber($number)
    {
        $number = static::convertScientificNotationToString($number);
        return parent::getDecimalsLengthFromNumber($number);
    }

    public static function min($number1 = null, $number2 = null, ...$numbers)
    {
        if (is_array($number1)) {
            return parent::min(...$number1);
        }
        if (is_null($number2)) {
            array_unshift($numbers, $number2);
        }
        if (is_null($number1)) {
            array_unshift($numbers, $number1);
        }
        return parent::min(...$numbers);
    }

    public static function max($number1 = null, $number2 = null, ...$numbers)
    {
        if (is_array($number1)) {
            return parent::max(...$number1);
        }
        if (is_null($number2)) {
            array_unshift($numbers, $number2);
        }
        if (is_null($number1)) {
            array_unshift($numbers, $number1);
        }
        return parent::max(...$numbers);
    }
}