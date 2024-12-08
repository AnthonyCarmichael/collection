<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtisteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('artistes')->insert([[
            'nom' => 'Philippe Brach',
            'folderPath' => 'Philippe Brach', 
            'imgPath' => 'Philippe Brach.jpg',
        ], [
            'nom' => 'Mac DeMarco',
            'folderPath' => 'Mac DeMarco', 
            'imgPath' => 'Mac DeMarco.jpg',
        ], [
            'nom' => 'L\'Impératrice',
            'folderPath' => 'imperatrice', 
            'imgPath' => 'imperatrice.jpg',
        ],[
            'nom' => 'King Gizzard & The Lizard Wizard',
            'folderPath' => 'kingGiz', 
            'imgPath' => 'kingGiz.jpg',
        ]]);
    }
}
