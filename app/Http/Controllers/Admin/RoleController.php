<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

final class RoleController extends Controller
{
    public function index(): View
    {
        return view('admin.roles.index', [
            'roles' => Role::all(),
        ]);
    }


    public function create(): View
    {
        return view('admin.roles.create');
    }


    public function store(Request $request): RedirectResponse
    {
        Role::create(['name' => $request->get(key: 'name')]);

        return redirect()->route(route: 'admin.roles.index');
    }
}
