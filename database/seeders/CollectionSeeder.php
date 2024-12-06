<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('collections')->insert([
            // Vous n'ajoutez pas de valeur pour 'id_collection', car elle est auto-incrémentée
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
