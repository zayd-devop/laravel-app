<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActeursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('acteurs')->insert([
            [
                'nom' => 'DiCaprio',
                'prenom' => 'Leonardo',
                'pays' => 'USA',
                'date_naissance' => '1974-11-11',
                'tel' => '123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Pacino',
                'prenom' => 'Al',
                'pays' => 'USA',
                'date_naissance' => '1940-04-25',
                'tel' => null, // Exemple de valeur nulle autorisée
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Cassel',
                'prenom' => 'Vincent',
                'pays' => 'France',
                'date_naissance' => '1966-11-23',
                'tel' => '0600000000',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
