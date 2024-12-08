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
            'folderPath' => 'collection/Philippe Brach/Philippe Brach - Portraits de famine', 
            'imgPath' => 'collection/Philippe Brach/Philippe Brach - Portraits de famine/cover.jpg',
            'annee' => '2015',
            'id_artiste' => 1,
        ], [
            'nom' => 'This Old Dog',
            'folderPath' => 'collection/Mac DeMarco/Mac DeMarco - This Old Dog', 
            'imgPath' => 'collection/Mac DeMarco/Mac DeMarco - This Old Dog/cover.jpg',
            'annee' => '2017',
            'id_artiste' => 2,

        ], [
            'nom' => 'Tako Tsubo',
            'folderPath' => 'collection/L\'Impératrice\L\'Impératrice - Tako Tsubo', 
            'imgPath' => 'collection/L\'Impératrice\L\'Impératrice - Tako Tsubo/cover.jpg',
            'annee' => '2021',
            'id_artiste' => 3,
        ],[
            'nom' => 'Matahari',
            'folderPath' => 'collection/L\'Impératrice\L\'Impératrice - Matahari', 
            'imgPath' => 'collection/L\'Impératrice\L\'Impératrice - Matahari/cover.jpg',
            'annee' => '2018',
            'id_artiste' => 3,
        ],[
            'nom' => 'Live At Red Rocks \'22',
            'folderPath' => 'collection/King Gizzard & The Lizard Wizard/King Gizzard & The Lizard Wizard - Live At Red Rocks \'22', 
            'imgPath' => 'collection/King Gizzard & The Lizard Wizard/King Gizzard & The Lizard Wizard - Live At Red Rocks \'22/cover.png',
            'annee' => '2023',
            'id_artiste' => 4,
        ],[
            'nom' => 'Ice, Death, Planets, Lungs, Mushrooms and Lava',
            'folderPath' => 'collection/King Gizzard & The Lizard Wizard/King Gizzard & The Lizard Wizard - Ice- Death- Planets- Lungs- Mushrooms and Lava', 
            'imgPath' => 'collection/King Gizzard & The Lizard Wizard/King Gizzard & The Lizard Wizard - Ice- Death- Planets- Lungs- Mushrooms and Lava/cover.jpg',
            'annee' => '2022',
            'id_artiste' => 4,
        ]]);
        
    }
}
