<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static UnitFrom()
 * @method static static UnitTo()
 */
final class UnitDefferableType extends Enum
{
    const UnitFrom = '>=';
    const UnitTo = '<=';
}
