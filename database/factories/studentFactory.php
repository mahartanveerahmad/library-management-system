<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class studentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender=['male','female'];
        return [
            'name' => $this->faker->name,
            'age' => random_int(18,80),
            'gender' => $gender[random_int(0,1)],
            'email' => $this->faker->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'semester' => $this->faker->sentence(3),
            'department' => $this->faker->randomElement(['Computer Science', 'Physics', 'Math', 'Business']),
            'student_session' => $this->faker->year . '-' . ($this->faker->year + 4),
        ];
    }
}
