<?php

namespace Database\Factories;

use App\Models\CoreWorkProcess;
use App\Models\User;
use App\Models\UserWorkProcess;
use App\Models\WorkProcess;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserWorkProcessFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserWorkProcess::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::all()->pluck('id');
        $coreworkprocess = CoreWorkProcess::all()->pluck('id');
        return [
            'user_id' => $this->faker->randomElement($user),
            'work_process_id' => $this->faker->randomElement($coreworkprocess),
            'done' =>$this->faker->boolean(50),
        ];
    }
}
