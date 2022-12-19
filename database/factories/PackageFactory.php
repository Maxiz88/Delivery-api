<?php

namespace Database\Factories;

use App\Models\Delivery;
use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Package::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'delivery_id' => $this->faker->randomElements(Delivery::all()->modelKeys())[0],
            'description' => $this->faker->text,
            'sender_name' => $this->faker->name,
            'sender_phone' => $this->faker->phoneNumber,
            'recipient_name' => $this->faker->name,
            'recipient_phone' => $this->faker->phoneNumber,
            'sender_address' => $this->faker->address,
            'delivery_address' => $this->faker->address,
            'weight' => $this->faker->randomFloat(2, 1, 10),

        ];
    }
}
