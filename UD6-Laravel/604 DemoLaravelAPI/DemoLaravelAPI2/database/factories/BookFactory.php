<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array //vemos cómo las nuevas versiones de LARAVEL ya incorporan el valor devuelto.
    {
        return [
            'user_id' => rand(2, 4),
            'title' => $this->faker->name(),
            'description' => $this->faker->text(),
        ];
    }
}
