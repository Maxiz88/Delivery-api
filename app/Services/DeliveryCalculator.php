<?php

namespace App\Services;

use App\Contracts\Calculator;
use App\Enums\CurrencyType;
use App\Enums\UnitDefferableType;
use App\Enums\UnitName;
use App\Enums\UnitType;
use App\Models\Package;

class DeliveryCalculator implements Calculator
{
    public function calculate()
    {
        $packages = Package::with('delivery.delivery_units.unit')->get();
        $data = [];
        foreach ($packages as $package) {
            $package_delivery_price = '';
            foreach ($package->delivery->delivery_units as $delivery_unit) {
                $delivery_unit_value = $this->convert($delivery_unit->unit->value, $delivery_unit->unit_value);
                $delivery_unit_price = $this->convert($package->delivery->currency->name, $delivery_unit->price);

                if($delivery_unit->unit_type === UnitType::Deffer()) {
                    $delivery_operator = $delivery_unit->unit_from ? UnitDefferableType::UnitFrom() :
                        UnitDefferableType::UnitTo();
                    $delivery_unit_price_assert = eval("return $package->weight $delivery_operator $delivery_unit_value;");
                    if(!$delivery_unit_price_assert) {
                        continue;
                    }
                }
                $package_delivery_price = round(($delivery_unit_price * $package->weight) / $delivery_unit_value, 2);
                break;
            }
            $data[] = [
                $package->id,
                $package->sender_name,
                $package->recipient_name,
                $package->delivery->company_name,
                $package->weight,
                $package_delivery_price
            ];
        }
        return $data;
    }

    public function convert($name, $value)
    {
        switch ($name) {
            case UnitName::Gram():
                $value = round($value / 1000, '2');
                break;
            case CurrencyType::USD():
                $value = round($value / 0.97, '2');;
                break;
        }
        return $value;
    }

}
