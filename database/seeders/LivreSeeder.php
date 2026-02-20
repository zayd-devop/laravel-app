<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LivreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('livres')->insert([
            ['titre' => 'Les Misérables', 'annee_publication' => 1862, 'nombre_pages' => 1232],
            ['titre' => 'Le Comte de Monte-Cristo', 'annee_publication' => 1844, 'nombre_pages' => 1312],
            ['titre' => 'Germinal', 'annee_publication' => 1885, 'nombre_pages' => 592],
        ]);
    }
}
