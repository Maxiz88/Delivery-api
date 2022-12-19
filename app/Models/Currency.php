<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'currencies';
    /**
     * @var string[]
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The delivery that belong to the Currency.
     */
    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }
}
