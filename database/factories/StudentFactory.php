<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'place_of_birth' => $this->faker->city,
            'date_of_birth' => $this->faker->date(),
            'geup' => $this->faker->numberBetween(1, 10),
            'reg_number' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'status' => $this->faker->randomElement(['aktif', 'non-aktif', 'suspended']),
        ];
    }
}
