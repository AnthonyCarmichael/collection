<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        DB::table('chansons')->insert([[ 
            'no' => 1,
            'nom' => 'Portraits de famine',
            'duree' => 82,
            'filePath' => 'Portraits de famine.mp3', 
            'id_album' => 1,
            'id_user' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'no' => 2,
            'nom' => 'Né pour être sauvage',
            'duree' => 253,
            'filePath' => 'Né pour être sauvage.mp3', 
            'id_album' => 1,
            'id_user' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ], [
            'no' => 1,
            'nom' => 'My Old Man',
            'duree' => 221,
            'filePath' => 'MyOldMan.mp3', 
            'id_album' => 2,
            'id_user' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ], [
            'no' => 2,
            'nom' => 'This Old Dog',
            'duree' => 150,
            'filePath' => 'thisolddog.mp3', 
            'id_album' => 2,
            'id_user' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ], [
            'no' => 1,
            'nom' => 'Anomalie bleue',
            'duree' => 232,
            'filePath' => 'anobleu.mp3', 
            'id_album' => 3,
            'id_user' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ], [
            'no' => 2,
            'nom' => 'Fou',
            'duree' => 309,
            'filePath' => 'fou.mp3', 
            'id_album' => 3,
            'id_user' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ], [
            'no' => 1,
            'nom' => 'La-Haut',
            'duree' => 231,
            'filePath' => 'lahaut.mp3', 
            'id_album' => 4,
            'id_user' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ], [
            'no' => 2,
            'nom' => 'Erreur 404',
            'duree' => 220,
            'filePath' => 'erreur.mp3', 
            'id_album' => 4,
            'id_user' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'no' => 1,
            'nom' => 'Mars For The Rich (Live At Red Rocks \'22)',
            'duree' => 322,
            'filePath' => 'mars.mp3', 
            'id_album' => 5,
            'id_user' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'no' => 2,
            'nom' => 'Hell (Live At Red Rocks \'22)',
            'duree' => 219,
            'filePath' => 'hell.mp3', 
            'id_album' => 5,
            'id_user' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'no' => 1,
            'nom' => 'Mycelium',
            'duree' => 455,
            'filePath' => 'Mycelium.mp3', 
            'id_album' => 6,
            'id_user' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'no' => 2,
            'nom' => 'Ice V',
            'duree' => 615,
            'filePath' => 'Ice V.mp3', 
            'id_album' => 6,
            'id_user' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]]);
    }
}
