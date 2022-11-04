<?php

namespace Database\Factories;

use App\Models\WorkCompetence;
use App\Models\User;
use App\Models\UserCompetence;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class UserCompetenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserCompetence::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::all()->pluck('id');
        $workcompetence = WorkCompetence::all()->pluck('id');
        return [
            'user_id' => $this->faker->randomElement($user),
            'competence_id' => $this->faker->randomElement($workcompetence),
            'done' => $this->faker->boolean(50),
        ];
    }
}
