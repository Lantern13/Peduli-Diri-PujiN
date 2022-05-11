<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Faker\Factory as Faker;

class PerjalananModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'user_id' => User::all()->random()->id,
            'tanggal' => $this->faker->date('Y-m-d'),
            'waktu' => $this->faker->time,
            'lokasi' => $this->faker->City,
            'suhu' => $this->faker->numberBetween(32, 40)
        ];
    }
}
