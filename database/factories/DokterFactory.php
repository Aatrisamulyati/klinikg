<?php

namespace Database\Factories;

use App\Models\Dokter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dokter>
 */
class DokterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Dokter::class;

    public function definition()
    {
        return [
            'dokter_id' => $this->faker->unique()->randomNumber(),
            'nama_dokter' => $this->faker->unique()->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'), // default password
            'foto_profil' => $this->faker->imageUrl(),
            'spesialis' => $this->faker->word,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
