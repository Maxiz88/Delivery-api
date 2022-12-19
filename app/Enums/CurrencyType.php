<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static EUR()
 * @method static static USD()
 */
final class CurrencyType extends Enum
{
    const EUR = 'EUR';
    const USD = 'USD';
}
