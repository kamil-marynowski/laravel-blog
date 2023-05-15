<?php

declare(strict_types=1);

namespace App\Services\Admin;

use App\Models\User;
use Illuminate\Http\Request;

final class UserService
{
    public function create(Request $request): void
    {
        $user = new User();

        $user->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);
    }


    public function update(Request $request, User $user): void
    {
        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);

        $user->assignRole($request->get('role'));
    }
}
