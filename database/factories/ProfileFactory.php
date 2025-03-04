<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'worker_id' => Worker::factory()->create(),
            'city' => $this->faker->city(),
            'skill' => $this->faker->word(),
            'experience' => $this->faker->numberBetween(1, 10),
            'finished_study_at' => $this->faker->date(),
        ];
    }
}
