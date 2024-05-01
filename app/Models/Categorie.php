<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = ['nom','parent_id']; 

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function sousCategories()
    {
        return $this->hasMany(Categorie::class, 'parent_id', 'id');
    }

    public function obtenirSousCategorie($id)
    {

        $ids = Categorie::where('parent_id', $id)->pluck('id')->toArray();
        if($ids){
            foreach ($ids as $id) {
                $ids = array_merge($ids, $this->obtenirSousCategorie($id));
            }
        }
        return $ids;
    }
}
