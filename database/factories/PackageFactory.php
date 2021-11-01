<?php

namespace Database\Factories;

use App\Models\Package;
use App\Models\User;
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
            'name' => $this->faker->title,
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(25, 100),
            'award_bids' => $this->faker->numberBetween(10, 80),
            'created_by' => User::first()->id,
        ];
    }
}
