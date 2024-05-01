<?php

namespace App\Repositories\Implementations;

use App\Models\Article;
use App\Repositories\Interfaces\ArticleRepositoryInterface;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function index()
    {
        return Article::all();
    }

    public function store(array $data)
    {
        return Article::create($data);
    }

    public function update(array $data, $id)
    {
        $resource = Article::findOrFail($id);
        $resource->update($data);
        return $resource;
    }

    public function destroy($id)
    {
        $resource = Article::findOrFail($id);
        $resource->delete();
    }

    public function getLatestNews()
    {
        $resource = Article::where('expiration_date', '>', now())
            ->orderBy('created_at')
            ->get();
        return $resource;
    }
}
