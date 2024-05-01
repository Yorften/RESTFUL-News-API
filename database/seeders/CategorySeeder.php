<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Actualités',
            'Divertissement',
            'Technologie',
            'Santé',

        ];

        foreach ($categories as $category) {
            Categorie::create([
                'name' => $category,
            ]);
        }

        Categorie::create([
            'name' => 'Politique',
            'parent_id'=> 1,
        ]);
        Categorie::create([
            'name' => 'Économie',
            'parent_id'=> 1,
        ]);
        Categorie::create([
            'name' => 'Sport',
            'parent_id'=> 1,
        ]);
        Categorie::create([
            'name' => 'Cinéma',
            'parent_id'=> 2,
        ]);
        Categorie::create([
            'name' => 'Musique',
            'parent_id'=> 2,
        ]);
        Categorie::create([
            'name' => 'Sorties',
            'parent_id'=> 2,
        ]);
        Categorie::create([
            'name' => 'Informatique',
            'parent_id'=> 3,
        ]);
        Categorie::create([
            'name' => 'Gadgets',
            'parent_id'=> 3,
        ]);
        Categorie::create([
            'name' => 'Médecine',
            'parent_id'=> 4,
        ]);
        Categorie::create([
            'name' => 'Bien-être',
            'parent_id'=> 4,
        ]);
  


        Categorie::create([
            'name' => 'Ordinateurs de bureau',
            'parent_id'=> 11,
        ]);
        Categorie::create([
            'name' => 'PC portable', 
            'parent_id'=> 11,
        ]);
        Categorie::create([
            'name' => 'Connexion internet',
            'parent_id'=> 11,
        ]);
        Categorie::create([
            'name' => 'Smartphones',
            'parent_id'=> 12,
        ]);
        Categorie::create([
            'name' => 'Tablettes',
            'parent_id'=> 12,
        ]);
        Categorie::create([
            'name' => 'Jeux vidéo',
            'parent_id'=> 12,
        ]);        
    }
}
