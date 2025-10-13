<?php

namespace Database\Factories;

use Master\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Master\Modules\Users\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    public function newModel(array $attributes = [])
    {
        return new User($attributes);
    }

    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'company_name' => $this->faker->company(),
            'password' => bcrypt('password'),
            'draft' => 0,
            // Aggiungi altri campi necessari basati sul tuo BaseModel
        ];
    }
}
