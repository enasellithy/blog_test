<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\ArticleResource;
use App\Models\Article;
use App\Solid\Repositories\ArticleRepository;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $article;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->article = $articleRepository;
    }

    public function index()
    {
        $data = ArticleResource::collection($this->article->getAll());
        return jsonDone($data);
    }

    public function show($id)
    {
        $data = new ArticleResource(Article::find($id));
        return jsonDone($data);
    }
}
