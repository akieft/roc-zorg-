<?php

namespace Database\Factories;

use App\Models\CoreTask;
use App\Models\CoreWorkProcess;
use App\Models\WorkProcess;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoreWorkProcessFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CoreWorkProcess::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $coretasks = CoreTask::all()->pluck('id');
        $workprocess = WorkProcess::all()->pluck('id');
        return [
            'core_task_id' => $this->faker->randomElement($coretasks),
            'work_process_id' =>$this->faker->randomElement($workprocess),
        ];
    }
}
