<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChansonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chansons')->insert([ 
            'no' => 1,
            'nom' => 'Portraits de famine',
            'duree' => 82,
            'filePath' => 'Portraits de famine.mp3', 
            'id_album' => 1,
            'id_collection' => 3
        ]);
    }
}
