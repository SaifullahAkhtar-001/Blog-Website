<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))
                ->paginate(6),

        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Post $post)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'thumbnail' => 'required|image',
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
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail');

        Post::create($attributes);
        return redirect("/posts/{$attributes['slug']}")->with('success','Post is successfully created ‍🚀 ');
    }
}
