<?php

namespace Database\Factories;

use App\Models\CoreTask;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoreTaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CoreTask::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->firstName(),
            'description' => $this->faker->realText(200),
        ];
    }
}
