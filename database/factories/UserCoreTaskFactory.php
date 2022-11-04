<?php

namespace Database\Factories;

use App\Models\CoreTask;
use App\Models\UserCoreTask;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserCoreTaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserCoreTask::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = CoreTask::all()->pluck('id');
        return [
            'user_id' => $this->faker->randomElement($user),
            'core_task_id' => $this->faker->randomElement($user),
        ];
    }
}
