<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'contact_person' => $this->faker->name,
//            'Role' => $this->faker->randomElement(['student', 'docent', 'bedrijf', 'admin']),
            'study' => $this->faker->word,
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'name_company' => $this->faker->company,
            'address_company' => $this->faker->address,
            'type_company' => $this->faker->company,
            'phone' => $this->faker->phoneNumber,
            'teacher_function' => $this->faker->word,
            'teacher_availability' => $this->faker->word,
        ];
    }
}
