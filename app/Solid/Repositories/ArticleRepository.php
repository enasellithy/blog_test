<?php

namespace App\Solid\Repositories;

use App\Models\Article;

class ArticleRepository
{
    public function create(array $data)
    {
        Article::create($data);
    }

    public function edit($id,array $data)
    {
        Article::where('id',$id)->update($data);
    }

    public function show($id)
    {
        return Article::find($id);
    }

    public function delete($id)
    {
        Article::find($id)->delete();
    }
}
