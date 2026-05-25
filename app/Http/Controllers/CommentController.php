<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
class CommentController extends Controller
{
        public function index() {
        $posts = Comment::all();
        return view('posts.index', compact('posts'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            "author" => ["required", "max:50"],
            "content" => ["required", "max:255"],
            "post_id" => ["required"]
        ]);

        Comment::create([
            "author" => $validated["author"],
            "content" => $validated["content"],
            "post_id" => $validated["post_id"]

        ]);
        return redirect('/posts/' . $validated["post_id"]);
    }

    public function edit(Comment $comment) {
        $comments = Comment::all();
        $comment_id = $comment->id;
        $post = $comment->post;
        return view('comments.edit', compact('comments', 'post', 'comment_id'));
    }

    public function update(Request $request, Comment $comment) {
        $validated = $request->validate([
            "content_edit" => ["required", "max:255"]
        ]);

        $comment->content = $validated["content_edit"];
        $comment->save();

        return redirect("/posts/" . $comment->post_id);
    }

    public function destroy(Comment $comment) {
        $post_id = $comment->post_id;
        $comment->delete();
        return redirect("/posts/$post_id");
    }
}