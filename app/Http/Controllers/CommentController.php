<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {

        $request->validate([
            'body' => 'required|string|max:500',
        ]);

        $post = Post::findOrFail($postId);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = $request->user_id;

        // Polymorphic relation
        $post->comments()->save($comment);

        return redirect()->route('posts.show', $post->id)->with('success', 'Comment added successfully!');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return back()->with('success', 'Comment deleted successfully!');
    }
}
