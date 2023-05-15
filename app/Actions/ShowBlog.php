<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Blog;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

final class ShowBlog
{
    use AsAction;

    public function handle(string $username, string $blogName)
    {
        $user = User::where('name', $username)->first();

        if ($user === null) {
            abort(404);
        }

        $blog = Blog::where('user_id', $user->id)
            ->where('name', $blogName)
            ->first();

        if ($blog === null) {
            abort(404);
        }

        return view('reader.blog', [
            'blog' => $blog
        ]);
    }
}
