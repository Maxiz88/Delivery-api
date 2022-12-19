<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use Filterable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'deliveries';

    protected $fillable = [
        'currency_id', 'company_name', 'description'
    ];
    /**
     * The currency that has Delivery.
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * The units that belong to the Delivery.
     */
    public function delivery_units()
    {
        return $this->hasMany(DeliveryUnit::class);
    }

    /**
     * Get the packages for the delivery
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function packages()
    {
        return $this->hasMany(Package::class);
    }

}
