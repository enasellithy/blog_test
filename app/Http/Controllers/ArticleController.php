<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\AddArticleRequest;
use App\Http\Requests\Article\EditArticleRequest;
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
        return view('article.index');
    }

    public function store(AddArticleRequest $r)
    {
        $this->article->create($r->all());
        done_msg();
        return back();
    }

    public function show($id)
    {
        $data = $this->article->show($id);
        return view('article.show', compact('data'));
    }

    public function update($id, EditArticleRequest $r)
    {
        $this->article->edit($id, $r->except('_token','_method'));
        done_msg();
        return back();
    }

    public function destroy($id)
    {
        $this->article->delete($id);
        done_msg();
        return back();
    }
}
