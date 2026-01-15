<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
    {
        DB::table('films')->insert([
            [
                'titre' => 'Inception',
                'pays' => 'USA',
                'annee' => 2010,
                'duree' => '02:28:00', 
                'genre' => 'Science-Fiction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'Le Parrain',
                'pays' => 'USA',
                'annee' => 1972,
                'duree' => '02:55:00',
                'genre' => 'Policier',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'La Haine',
                'pays' => 'France',
                'annee' => 1995,
                'duree' => '01:38:00',
                'genre' => 'Drame',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
