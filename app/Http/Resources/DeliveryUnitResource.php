<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryUnitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'unit_type' => $this->unit_type ? 'not fixed' : 'fixed',
            'unit_value' => $this->unit_value .' '. $this->unit->value,
            'unit_from' => (bool) $this->unit_from,
            'unit_to' => (bool) $this->unit_to,
            'price' => $this->price,
            'unit_spec' => [
                'id' => $this->unit->id,
                'name' => $this->unit->name,
                'value' => $this->unit->value,
            ]
        ];
    }
}
