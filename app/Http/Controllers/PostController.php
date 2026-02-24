<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::published()
            ->orderByDesc('published_at')
            ->get(['id', 'title', 'slug', 'excerpt', 'tags', 'read_time_minutes', 'published_at']);

        return Inertia::render('Blog/Index', [
            'posts' => $posts,
        ]);
    }

    public function show(string $slug)
    {
        $post = Post::published()->where('slug', $slug)->firstOrFail();

        return Inertia::render('Blog/Show', [
            'post' => $post,
        ]);
    }
}
