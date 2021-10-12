<?php

namespace Database\Factories;

use App\Models\Customer_info;
use Illuminate\Database\Eloquent\Factories\Factory;

class Customer_infoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer_info::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    // public function definition()
    // {
    //     return [
    //         'customer_id' => factory(App\Models\Customers::class),
    //         'communication_date' => $this->faker->communication_date(),
    //         'communication_type' => $this->faker->communication_type(),
    //         'communication_scope' => $this->faker->communication_scope(),
    //         'projected_price' => $this->faker->projected_price(),
    //         'invoiced' => $this->faker->invoiced(),
    //     ];
    // }
}
