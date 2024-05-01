<?php

namespace App\Repositories\Interfaces;

interface ArticleRepositoryInterface
{
    public function index();
    
    public function store(array $data);

    public function update(array $data, $id);

    public function destroy($id);
    
    public function getLatestNews();
}
