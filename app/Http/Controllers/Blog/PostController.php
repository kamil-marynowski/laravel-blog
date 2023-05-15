<?php

declare(strict_types=1);

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class PostController extends Controller
{
    public function index(Blog $blog): View
    {
        $posts = Post::where('blog_id', $blog->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view(view: 'blog.posts.index', data: [
            'posts' => $posts,
            'blog'  => $blog
        ]);
    }


    public function create(Blog $blog): View
    {
        return view(view: 'blog.posts.create', data: [
            'blog' => $blog,
        ]);
    }


    public function store(Request $request, Blog $blog): RedirectResponse
    {
        Post::create([
            'content' => $request->get('content'),
            'blog_id' => $blog->id,
            'title'   => $request->get('title'),
        ]);

        return redirect()->route('blogs.posts.index', ['blog' => $blog]);
    }
}
