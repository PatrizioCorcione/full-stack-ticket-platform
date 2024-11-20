<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        Category::create(['name' => 'Tecnico', 'description' => 'Problemi tecnici']);
        Category::create(['name' => 'Amministrativo', 'description' => 'Problemi amministrativi']);
        Category::create(['name' => 'Generale', 'description' => 'Problemi generali']);
    }
}
