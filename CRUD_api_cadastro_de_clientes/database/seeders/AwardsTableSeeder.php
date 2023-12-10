<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Award;
class AwardsTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar 5 registros de prêmios
        for ($i = 1; $i <= 5; $i++) {
            Award::create([
                'description' => "Prêmio $i",
                'location' => "Estabelecimento $i",
                'value' => rand(100, 1000),
                'quantity' => rand(1, 10),
                'draw_date' => now()->addDays($i),
            ]);
        }
    }
}
