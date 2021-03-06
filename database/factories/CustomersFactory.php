<?php

namespace Database\Factories;

use App\Models\Customers;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    // public function definition()
    // {
    //     return [
    //         'name_surename' => $this->$faker->name(),
    //         'company' => $this->$faker->company(),
    //         'telephone' => $this->$faker->telephone(),
    //         'address' => $this->$faker->address(),
    //         'email' => $this->$faker->unique()->safeEmail()
    //     ];
    // }
}
