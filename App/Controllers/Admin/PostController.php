<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = (new Post($this->getDb()))->all();

        return $this->view('admin.post.index', compact('posts'));
    }

    public function edit(int $id)
    {
        $post = (new Post($this->getDb()))->findById($id);
        return $this->view('admin.post.edit', compact('post'));

    }

    public function update(int $id)
    {
        $post = new Post($this->getDb());
        $result = $post->update($id, $_POST);

        if ($result) {
            return header('Location: http://localhost/site_php/admin/posts');
        }
    }

    public function destroy(int $id)
    {
        $post = new Post($this->getDb());
        $result = $post->destroy($id);

        if ($result) {
            return header('Location: http://localhost/site_php/admin/posts');
        }
    }

}
