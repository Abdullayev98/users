<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'created_at' => now(),
            'start_date'=> now(),
            'end_date'=>now(),
            'budget'=>$this->faker->numberBetween(1 ,20000),
            'description'=>$this->faker->text,
            'description_private'=>$this->faker->text,
            'services_id'=>$this->faker->numberBetween(1,10),
            'providers_id'=>$this->faker->numberBetween(1,10),

        ];
    }
}
