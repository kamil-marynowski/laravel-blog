<?php

declare(strict_types=1);

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class BlogController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        $blogs = $user?->blogs;

        return view(view: 'blog.blogs.index', data: [
            'blogs' => $blogs,
        ]);
    }


    public function create(): View
    {
        return view(view: 'blog.blogs.create');
    }


    public function store(Request $request): RedirectResponse
    {
        Blog::create([
            'description' => $request->get('description'),
            'user_id'     => auth()->user()->id,
            'name'        => $request->get('name'),
        ]);

        return redirect()->route('blogs.index');
    }
}
