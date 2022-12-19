<?php

namespace App\Http\Filters;

use App\Models\Delivery;
use Illuminate\Database\Eloquent\Builder;

class DeliveryFilter extends QueryFilter
{
    /**
     * @param string $company_name
     */
    public function companyName(string $company_name)
    {
        $this->builder->where('company_name', strtolower($company_name));
    }

    /**
     * @param string $description
     */
    public function description(string $description)
    {
        $words = array_filter(explode(' ', $description));

        $this->builder->where(function (Builder $query) use ($words) {
            foreach ($words as $word) {
                $query->where('description', 'like', "%$word%");
            }
        });
    }

    /**
     * @param float $price
     * @return void
     */
    public function price(float $price)
    {
        $this->builder->whereHas('delivery_units', function (Builder $query) use ($price) {
            $query->where('price', '=', $price);
        });
    }

    /**
     * @param float $weight
     * @return void
     */
    public function weight(float $weight)
    {
        $this->builder->whereHas('delivery_units', function (Builder $query) use ($weight) {
            $query->where('unit_value', '=', $weight);
        });
    }
}
