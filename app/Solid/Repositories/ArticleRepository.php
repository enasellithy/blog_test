<?php

namespace App\Solid\Repositories;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class ArticleRepository
{
    public function getAll()
    {
        return Article::with(['user','comments'])->latest()->paginate(10);
    }

    public function create(array $data)
    {
        Article::create($data);
    }

    public function edit($id, array $data)
    {
        Article::where('id', $id)->update($data);
    }

    public function show($id)
    {
        return Article::find($id);
    }

    public function saveComment(array $data){
        Auth::user()->comments()->save(new Comment($data));
    }
}
