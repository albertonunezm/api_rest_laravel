<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(20);

        return view('index' ,[
            'posts' => $posts
        ]);
    }
}
