<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory([
                'type' => 'admin',
            ]),
            'nature_of_appointment' => $this->faker->randomElement(['']),
            'selection_mode' => '',
            'date_of_joining' => $this->faker->date(),
            'teaching_start_date' => $this->faker->date(),
            'highest_qualification' => $this->faker->randomElement(['']),
            'additional_qualification' => $this->faker->randomElement(['']),
            'discipline' => $this->faker->randomElement(['']),
            'experience' => $this->faker->randomNumber(),
            'designation' => $this->faker->randomElement(['']),
            'department_id' => function (array $attributes) {
                return Department::find(1);
            },
        ];
    }
}
