<?php

namespace Database\Factories;

use App\Models\CoreTask;
use App\Models\WorkProcess;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkProcessFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkProcess::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = CoreTask::all()->pluck('id');
        return [
            'title' => $this->faker->firstName(),
            'description' => $this->faker->realText(200),
            'core_task_id' => $this->faker->randomElement($user),
        ];
    }
}
