<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('updated_at')
            ->get(['id', 'title', 'slug', 'status', 'tags', 'read_time_minutes', 'published_at', 'updated_at']);

        return Inertia::render('Admin/Posts/Index', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Posts/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => 'nullable|string|max:255|unique:posts,slug',
            'excerpt'          => 'nullable|string',
            'content'          => 'required|string',
            'status'           => 'required|in:draft,published',
            'tags'             => 'nullable|array',
            'tags.*'           => 'string|max:50',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        if ($validated['status'] === 'published') {
            $validated['published_at'] = now();
        }

        Post::create($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Post created.');
    }

    public function edit(Post $post)
    {
        return Inertia::render('Admin/Posts/Edit', [
            'post' => $post,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => 'nullable|string|max:255|unique:posts,slug,' . $post->id,
            'excerpt'          => 'nullable|string',
            'content'          => 'required|string',
            'status'           => 'required|in:draft,published',
            'tags'             => 'nullable|array',
            'tags.*'           => 'string|max:50',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        if ($validated['status'] === 'published' && ! $post->published_at) {
            $validated['published_at'] = now();
        }

        $post->update($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted.');
    }
}
