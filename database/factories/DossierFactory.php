<?php

namespace Database\Factories;

use App\Models\Dossier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class DossierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dossier::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::all()->pluck('id');
        return [
            'test_dutch' => $this->faker->randomFloat(1, 1, 10),
            'test_care' => $this->faker->randomFloat(1, 1, 10),
            'test_essay' => $this->faker->randomFloat(1, 1, 10),
            'test_math' => $this->faker->randomFloat(1, 1, 10),
            'student_id' => $this->faker->unique()->randomElement($user),
        ];
    }
}
