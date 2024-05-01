<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Repositories\Interfaces\ArticleRepositoryInterface;

class ArticleController extends Controller
{
    public function __construct (public  ArticleRepositoryInterface $repository) {}

    // index method
    public function index()
    {
        $Articles = $this->repository->index();
        return response()->json($Articles);
    }

    // store method
    public function store(StoreArticleRequest $request)
    {
        $Articles = $this->repository->store($request->all());
        return response()->json($Articles);
    }

    // update method
    public function update(UpdateArticleRequest $request, Article $Article)
    {
        $Articles = $this->repository->update($request->all(), $Article->id);
        return response()->json($Articles);
    }

    // destroy method
    public function destroy(Article $Article)
    {
        $Articles = $this->repository->destroy($Article->id);
        return response()->json($Articles);
    }

    // getLastestNews method
    public function getLatestNews()
    {
        $Articles = $this->repository->getLatestNews();
        return response()->json($Articles);
    }

    // getArticlesByCategoryName
    public function getArticlesByCategoryName(Request $request)
    {
        $nomCategorie = $request->input('nom_categorie');
        $categorie = Categorie::where('name', $nomCategorie)->first();
    
        if ($categorie) {
            $idsSousCategories = $categorie->obtenirSousCategorie($categorie->id);
            array_unshift($idsSousCategories, $categorie->id);

            $articles = Article::whereIn('categorie_id', $idsSousCategories)
                ->whereDate('date_debut', '<=', now())
                ->whereDate('date_expiration', '>=', now())
                ->get();
    
            return response()->json($articles);
        } else {
            return response()->json(['message' => 'Catégorie non trouvée'], 404);
        }
    }
    

}
