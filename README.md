# laravel-math
High precision calculation library for Laravel.

This library is an extension of https://github.com/krowinski/bcmath-extended

## Improvement

1. Laravel Provider and Facade.
2. Some intetesting new methods and global functions.

## Installation

Require PHP Version >=7.1.0

```
composer require mydansun/laravel-math
```

Laravel 5.5 uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.

### Laravel 5.5+:

If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```
Mydansun\Math\Providers\ServiceProvider::class,
```

If you want to use the facade to log messages, add this to your facades in app.php:

```
Mydansun\Math\Facades\Math::class,
```

## Usage

You can check the full document on pages of [krowinski/bcmath-extended](https://github.com/krowinski/bcmath-extended). All of methods in bcmath-extended can be used by calling `\Math::` before the method name in your Laravel project.

Here are something new.

### Methods

#### Math::gt($left, $right, $scale = null)

Return true if the left is greater than the right.

#### Math::gte($left, $right, $scale = null)

Return true if the left is greater or equal to the right.

#### Math::lt($left, $right, $scale = null)

Return true if the left is less than the right.

#### Math::lte($left, $right, $scale = null)

Return true if the left is less or equal to the right.

#### Math::eq($left, $right, $scale = null)

Return true if the left is equal to the right.

#### Math::roundUp($number, $precision = 0)

If the next decimal place of $precision is not 0, then the number in the $precision position is incremented by 1.

Examples

```php
\Math::roundUp("3.140",2) // "3.14"
\Math::roundUp("3.141",2) // "3.15"
\Math::roundUp("3.1409",2) // "3.14"
```

#### Math::absUp($number, $precision = 0)

If there is a non-zero decimal place after $precision, the number of $precision is incremented by one.

Examples

```php
\Math::absUp("3.14000001",2) // "3.15"
```

#### Math::removeEndZeros($number)

Remove the 0 at the end of the number.

#### Math::getDecimalsLengthFromNumber($number)

Get a number of the length of decimals.

### Global functions

#### to_number($number)

Convert any numeric variable to a string-based number.

Examples

```php
to_number(1e-8) // "0.00000001"
to_number(0.1) // "0.1"
```

#### remove_end_zeros($number)

Same as `Math::removeEndZeros($number)`


#### count_decimal($number)

Same as `Math::getDecimalsLengthFromNumber($number)`


#### number_display($number, $decimals = null, $decPoint = '.', $thousandSep = ',')

Convert any numeric variable in a string-based number and beautify the display. Similar to `number_format`, but automatically get the length of decimals.


