<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    private $storge;

    public function home()
    {
        // redis has posts.all key exists
        // posts found then it will return all post without touching the database
        if ($articles = Redis::get('articles.all')) {
            return json_decode($articles);
        }

        // get all post
        $articles = Article::all();

        // store into redis
        Redis::set('articles.all', $articles);

        // return all posts
        return $articles;
//        return view('website.home');
    }
}
