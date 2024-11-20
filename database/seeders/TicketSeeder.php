<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\User;
use Faker\Factory as Faker;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { {
            $faker = Faker::create();
            $users = User::all();

            foreach (range(1, 20) as $index) {
                Ticket::create([
                    'titolo' => $faker->sentence(3),
                    'descrizione' => $faker->paragraph,
                    'data' => $faker->date(),
                    'stato' => $faker->randomElement(['ASSEGNATO', 'IN LAVORAZIONE', 'CHIUSO']),
                    'category_id' => rand(1, 3),
                    'operatori_id' => rand(1, 5),
                ]);
            }
        }
    }
}
