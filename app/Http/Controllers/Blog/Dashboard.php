<?php

declare(strict_types=1);

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

final class Dashboard extends Controller
{
    public function __invoke(): View
    {
        return view('blog.dashboard');
    }
}
