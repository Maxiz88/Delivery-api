<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryUnit extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'delivery_unit';

    protected $fillable = [
        'unit_id', 'unit_type', 'unit_value', 'unit_from', 'unit_to', 'price'
    ];

    /**
     * Get the delivery that owns the delivery unit.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

    /**
     * Get the unit that owns the delivery unit.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * Get the package that owns the delivery unit.
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
