<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class productsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'p_id' => '1',
            'p_name' =>  $this->faker->name(),
            'price' => $this->faker->randomFloat(2,1,100),
            'cat' =>'1',
        ];
    }
}
