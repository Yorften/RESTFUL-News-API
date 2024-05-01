<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id = Categorie::inRandomOrder()->pluck('id')->first();
        return [
            'Titre' => $this->faker->sentence,
            'Contenu' => $this->faker->paragraph,
            'Categorie_id' => $id, 
            'Date_debut' => $this->faker->date(),
            'Date_expiration' => $this->faker->date(),
        ];
    }
}
