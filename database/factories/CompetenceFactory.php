<?php

namespace Database\Factories;

use App\Models\Competence;
use App\Models\WorkProcess;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompetenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Competence::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = WorkProcess::all()->pluck('id');
        return [
            'title' => $this->faker->firstName(),
            'work_process_id' => $this->faker->randomElement($user),
        ];
    }
}
