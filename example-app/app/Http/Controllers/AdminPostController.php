<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin/posts/index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {

        $attributes = $this->getAttributes();

        Post::create($attributes);
        return redirect("/posts/{$attributes['slug']}")->with('success', 'Post is successfully created ‍🚀 ');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = $this->getAttributes();

        Post::update($attributes);
        return redirect("/posts/{$attributes['slug']}")->with('success', 'Post is successfully created ‍🚀 ');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }

    public function getAttributes(): array
    {
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'thumbnail' => 'image',
            'category_id' => [
                'required',
                Rule::exists('categories', 'id')
            ]
        ]);
        $attributes['slug'] = Str::slug($attributes['title']);
        $counter = 1;
        while (Post::where('slug', $attributes['slug'])->exists()) {
            $attributes['slug'] = $attributes['slug'] . '-' . $counter;
            $counter++;
        }
        $attributes['user_id'] = auth()->id();
        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail');
        }
        return $attributes;
    }
}
