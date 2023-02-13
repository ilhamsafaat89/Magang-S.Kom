<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 0; $i<30; $i++){
            Mahasiswa::create([
                'pembimbing_id' => $faker->numberBetween(1,10),
                'npm' => $faker->numerify('2022#########'),
                'nama' => $faker->firstName. " ".$faker->lastName,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'jurusan' => $faker->jobTitle(),
                'pembimbing' => $faker->firstName. " ".$faker->lastName,
                'status' => ''
            ]);
        }
    }
}
