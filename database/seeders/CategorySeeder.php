<?php

namespace Database\Seeders;

use App\Models\Category;
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
            Category::create([
                'name' => $category,
            ]);
        }

        Category::create([
            'name' => 'Politique',
            'parent_id'=> 1,
        ]);
        Category::create([
            'name' => 'Économie',
            'parent_id'=> 1,
        ]);
        Category::create([
            'name' => 'Sport',
            'parent_id'=> 1,
        ]);
        Category::create([
            'name' => 'Cinéma',
            'parent_id'=> 2,
        ]);
        Category::create([
            'name' => 'Musique',
            'parent_id'=> 2,
        ]);
        Category::create([
            'name' => 'Sorties',
            'parent_id'=> 2,
        ]);
        Category::create([
            'name' => 'Informatique',
            'parent_id'=> 3,
        ]);
        Category::create([
            'name' => 'Gadgets',
            'parent_id'=> 3,
        ]);
        Category::create([
            'name' => 'Médecine',
            'parent_id'=> 4,
        ]);
        Category::create([
            'name' => 'Bien-être',
            'parent_id'=> 4,
        ]);
  


        Category::create([
            'name' => 'Ordinateurs de bureau',
            'parent_id'=> 11,
        ]);
        Category::create([
            'name' => 'PC portable', 
            'parent_id'=> 11,
        ]);
        Category::create([
            'name' => 'Connexion internet',
            'parent_id'=> 11,
        ]);
        Category::create([
            'name' => 'Smartphones',
            'parent_id'=> 12,
        ]);
        Category::create([
            'name' => 'Tablettes',
            'parent_id'=> 12,
        ]);
        Category::create([
            'name' => 'Jeux vidéo',
            'parent_id'=> 12,
        ]);        
    }
}
