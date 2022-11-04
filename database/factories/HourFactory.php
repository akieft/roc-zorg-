<?php

namespace Database\Factories;

use App\Models\Hour;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class HourFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hour::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::all()->pluck('id');
        return [
            'calendar' => now(),
            'present' => $this->faker->randomFloat(2, 1, 200),
            'absent' => $this->faker->randomFloat(2, 1, 200),
            'sick' => $this->faker->randomFloat(2, 1, 200),
            'school' => $this->faker->randomFloat(2, 1, 200),
            'student_id' => $this->faker->unique()->randomElement($user),
        ];
    }
}
