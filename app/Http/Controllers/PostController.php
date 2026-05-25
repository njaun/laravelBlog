<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
    public function show(Post $post) {
        $comments = Comment::all();
        $post->load('category');
        return view('posts.show', compact('post', 'comments'));
    }
    public function create() {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
        }

    public function store(Request $request) {
        $validated = $request->validate([
            "title" => ["required", "max:255"],
            "content" => ["required", "max:255"],
            "category_id" => ["required"]
        ]);

        Post::create([
            "title" => $validated["title"],
            "content" => $validated["content"],
            "category_id" => $validated["category_id"]
        ]);
        return redirect('/');
    }

    public function edit(Post $post) {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post) {
        $validated = $request->validate([
            "title" => ["required", "max:255"],
            "content" => ["required", "max:255"],
            "category_id" => ["required"]
        ]);

        $post->title = $validated["title"];
        $post->content = $validated["content"];
        $post->category_id = $validated["category_id"];

        $post->save();

        return redirect("/posts/$post->id");
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect('/');
    }
}