<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MjuStudent>
 */
class MjuStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //$table->string('student_code')->primary();
            //$table->string('first_name');
            //$table->string('last_name')->nullable();
            //$table->string('first_name_en');
            //$table->string('last_name_en')->nullable();
            //$table->unsignedBigInteger('major_id');
            //$table->string('idcard');
            //$table->date('birthdate')->nullable();
            //$table->char('gender',1)->nullable();
            //$table->string('address');
            //$table->string('phone');
            //$table->string('email')->unique();
            'student_code' => fake()->unique()->regexify('[0-9]{15}'),
            'first_name' => fake('th_TH')->name,
            'last_name' => fake('th-TH')->lastName,
            'first_name_en' => fake()->name(),
            'last_name_en' => fake()->lastName(),
            'major_id' => 1,
            'idcard' =>fake()->unique()->regexify('[0-9]{13}'),
            'birthdate' =>fake()->dateTimeBetween(),
            'gender'=> fake()->randomElement(['M','F','L','G','B','T']),
            'address' => fake()->address(),
            'phone' => fake()->numerify('##########'),
            'email' => fake()->unique()->email()
         ];
    }
}
