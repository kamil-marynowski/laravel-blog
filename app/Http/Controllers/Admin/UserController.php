<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Admin\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

final class UserController extends Controller
{
    public function __construct(private readonly UserService $userService) {}


    /**
     * @return View
     */
    public function index(): View
    {
        return view('admin.users.index', [
            'users' => User::all(),
        ]);
    }


    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.users.create');
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->userService->create($request);

        return redirect()->route('admin.users.index')->with('success', 'User created!');
    }


    /**
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        $roles = Role::all()->pluck('name');

        return view(view: 'admin.users.edit', data: [
            'roles' => $roles,
            'user'  => $user
        ]);
    }


    /**
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $this->userService->update($request, $user);

        return redirect()->route('admin.users.index')->with('success', 'User updated!');
    }


    /**
     * @param User $user
     * @return View
     */
    public function show(User $user): View
    {
        return view('admin.users.show', ['user' => $user]);
    }


    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted!');
    }
}
