<?php

namespace Database\Factories;

use App\Models\Competence;
use App\Models\WorkCompetence;
use App\Models\WorkProcess;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkCompetenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkCompetence::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $workprocess = WorkProcess::all()->pluck('id');
        $competences = Competence::all()->pluck('id');
        return [
            'work_process_id' => $this->faker->randomElement($workprocess),
            'competence_id' => $this->faker->randomElement($competences),
        ];
    }
}
