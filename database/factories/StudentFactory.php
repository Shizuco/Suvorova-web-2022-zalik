<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        return [
            'fio' => $this->faker->name(),
            'group' => $this->faker->text(10),
            'course' => $this->faker->randomDigit(),
        ];
    }
}