<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpruntSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('emprunts')->insert([
            ['livre_id' => 1, 'date_emprunt' => '2024-01-01', 'date_retour' => '2024-01-15'],
            ['livre_id' => 2, 'date_emprunt' => '2024-01-05', 'date_retour' => null],
            ['livre_id' => 3, 'date_emprunt' => '2024-01-10', 'date_retour' => null],
        ]);
    }
}
