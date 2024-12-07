<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('albums')->insert([
            'nom' => 'Portraits de famine',
            'folderPath' => 'Portraits de famine', 
            'imgPath' => 'Portraits de famine',
            'annee' => '2015',
            'id_artiste' => 1,
        ]);
        
    }
}
