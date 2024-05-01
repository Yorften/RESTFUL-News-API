<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'parent_id'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }


    public function getCategoryChildren($id)
    {

        $ids = Category::where('parent_id', $id)->pluck('id')->toArray();
        if ($ids) {
            foreach ($ids as $id) {
                $ids = array_merge($ids, $this->getCategoryChildren($id));
            }
        }
        return $ids;
    }
}
