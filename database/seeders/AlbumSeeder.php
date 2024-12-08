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
        DB::table('albums')->insert([[
            'nom' => 'Portraits de famine',
            'folderPath' => 'Portraits de famine', 
            'imgPath' => 'Portraits de famine',
            'annee' => '2015',
            'id_artiste' => 1,
        ], [
            'nom' => 'This Old Dog',
            'folderPath' => 'This Old Dog', 
            'imgPath' => 'This Old Dog.jpg',
            'annee' => '2017',
            'id_artiste' => 2,

        ], [
            'nom' => 'Tako Tsubo',
            'folderPath' => 'Tako Tsubo', 
            'imgPath' => 'imgPath.jpg',
            'annee' => '2021',
            'id_artiste' => 3,
        ],[
            'nom' => 'Matahari',
            'folderPath' => 'matahari', 
            'imgPath' => 'matahari.jpg',
            'annee' => '2018',
            'id_artiste' => 3,
        ],[
            'nom' => 'Live At Red Rocks \'22',
            'folderPath' => 'Live At Red Rocks', 
            'imgPath' => 'Live At Red Rocks.jpg',
            'annee' => '2023',
            'id_artiste' => 4,
        ],[
            'nom' => 'Ice, Death, Planets, Lungs, Mushrooms and Lava',
            'folderPath' => 'Ice, Death, Planets, Lungs, Mushrooms and Lava', 
            'imgPath' => 'Ice, Death, Planets, Lungs, Mushrooms and Lava.jpg',
            'annee' => '2022',
            'id_artiste' => 4,
        ]]);
        
    }
}
