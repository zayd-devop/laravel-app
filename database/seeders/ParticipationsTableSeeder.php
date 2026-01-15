<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParticipationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // On suppose ici que les IDs sont séquentiels (1, 2, 3) suite aux inserts précédents.
        DB::table('participations')->insert([
            [
                'films_id' => 1, // Inception
                'acteur_id' => 1, // DiCaprio
                'role' => 'Cobb',
                'typeRole' => 'principal', // Valeur enum obligatoire
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'films_id' => 2, // Le Parrain
                'acteur_id' => 2, // Al Pacino
                'role' => 'Michael Corleone',
                'typeRole' => 'principal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'films_id' => 3, // La Haine
                'acteur_id' => 3, // Vincent Cassel
                'role' => 'Vinz',
                'typeRole' => 'principal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Exemple d'un rôle secondaire (fictif pour l'exercice)
            [
                'films_id' => 1, // Inception
                'acteur_id' => 3, // Vincent Cassel (caméo fictif)
                'role' => 'Passant',
                'typeRole' => 'secondaire',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }

}
