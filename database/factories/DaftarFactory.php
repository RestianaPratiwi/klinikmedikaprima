<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Daftar>
 */
class DaftarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $idPasien = \App\Models\Pasien::pluck('id')->toArray();
        return [
            'pasien_id' => $this->faker->randomElement($idPasien),
            'tanggal_daftar' => $this->faker->date(),
            'poli' => $this->faker->randomElement(['Umum', 'Gigi', 'Kandungan', 'Mata', 'Anak']),
            'keluhan' => $this->faker->randomElement(['Pusing', 'Mual', 'Nyeri perut', 'Muntah', 'Kesulitan bernapas', 'Kejang', 'Mata merah', 'Penglihatan kabur']),
            'diagnosis' => $this->faker->randomElement(['Rabun jauh', 'Diare', 'Asma', 'Demam Berdarah', 'Tipes']),
            'tindakan' => $this->faker->randomElement(['Memberikan rujukan ke spesialis', 'Vaksinasi', 'Cek darah', 'Pemberian obat bius', 'Tes refraksi mata']),
        ];
    }
}
