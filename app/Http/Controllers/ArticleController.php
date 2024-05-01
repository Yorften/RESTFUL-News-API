<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Category;
use App\Repositories\Interfaces\ArticleRepositoryInterface;

class ArticleController extends Controller
{
    public function __construct(public  ArticleRepositoryInterface $repository)
    {
    }

    public function index()
    {
        $articles = $this->repository->index();
        return response(new ArticleResource($articles));
    }

    // store method
    public function store(StoreArticleRequest $request)
    {
        $this->repository->store($request->validated());
        return response(['message' => 'Article added succsessfully!'], 200);
    }

    // update method
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $validated = $request->validated();
        $this->repository->update($validated, $article->id);
        return response(['message' => 'Article updated succsessfully!'], 200);
    }

    // destroy method
    public function destroy(Article $article)
    {
        $this->repository->destroy($article->id);
        return response(['message' => 'Article deleted succsessfully!'], 200);
    }

    // getLastestNews method
    public function getLatestNews()
    {
        $articles = $this->repository->getLatestNews();
        return response(new ArticleResource($articles));
    }

    // getArticlesByCategoryName
    public function getArticlesByCategoryName(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string',
        ]);
        $category = Category::where('name', $validated['category'])->first();

        if ($category) {
            $children = $category->getCategoryChildren($category->id);
            array_unshift($children, $category->id);

            $articles = Article::whereIn('category_id', $children)
                ->whereDate('expiration_date', '>=', now())
                ->get();

            return response(new ArticleResource($articles));
        } else {
            return response()->json(['message' => 'Category not found'], 404);
        }
    }
}
