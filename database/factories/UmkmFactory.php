<?php

namespace Database\Factories;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\Potensi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\umkm>
 */
class UmkmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $kelurahan = Kelurahan::inRandomOrder()->first();
        $kecamatan = $kelurahan->kecamatan ?? Kecamatan::inRandomOrder()->first();
        $potensi = Potensi::inRandomOrder()->first();

        return [
            'nama_usaha' => $this->faker->company,
            'alamat' => $this->faker->address,
            'kelurahan_id' => $kelurahan->id,
            'kecamatan_id' => $kecamatan->id,
            'potensi_id' => $potensi->id,
            'kontak' => $this->faker->phoneNumber,
            'latitude' => $this->faker->latitude(-7.7, -7.5),
            'longitude' => $this->faker->longitude(111.4, 111.6),
        ];
    }
}
