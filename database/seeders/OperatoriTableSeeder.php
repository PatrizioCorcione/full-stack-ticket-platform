<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Operatore;
use Faker\Factory as Faker;

class OperatoriTableSeeder extends Seeder
{
    public function run()
    {
        // Crea un'istanza di Faker
        $faker = Faker::create();

        // Genera 10 operatori casuali
        for ($i = 0; $i < 5; $i++) {
            Operatore::create([
                'nome' => $faker->name,
            ]);
        }
    }
}
