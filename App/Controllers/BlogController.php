<?php

namespace App\Controllers;

use App\Models\Post;
use App\Models\Tags;

class BlogController extends Controller
{

    public function welcome()
    {
        return $this->view('blog.welcome');
    }

    public function index()
    {
        $post = new Post($this->getDb());
        $posts = $post->all();

        return $this->view('blog.index', compact('posts'));
    }

    public function show(int $id)
    {
        $post = new Post($this->getDb());
        $post = $post->findById($id);
        return $this->view('blog.show', compact('post'));
    }

    public function tag(int $id)
    {
        $tag = (new Tags($this->getDb()))->findById($id);
        return $this->view('blog.tag', compact('tag'));
    }
}
