<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $mypost = Post::all();

        return view('post.index',compact('mypost'));
    }

    public function show($id) {
        $post = Post::find($id);

        return view('post/show','post.index', compact('post'));
    }

    public function create() {
        return view('post.create');
    }

    public function store() {
        $data = request()->validate([
            "title" => "required|string",
            "content" => "required|string",
            "tags" => "nullable|array"
        ]);

        $data['file'] = request()->file('preview_image');

        $result = Post::createPost($data);

        if ($result['status_code'] == 'error') {
            return redirect()->back()->withErrors(['error' => $result['status_message']]);
        }else{
            return redirect()->route('forum.index');
        }
    }

    public function update() {

    }

    public function delete() {

    }
}
