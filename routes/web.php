<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware('role:admin')->name('admin.')->group(function () {
    Route::name('users.')->group(function () {
        Route::get('/admin/users', [ UserController::class, 'index'])
            ->name('index');
        Route::get('/admin/users/create', [ UserController::class, 'create'])
            ->name('create');
        Route::post('/admin/users', [ UserController::class, 'store'])
            ->name('store');
        Route::get('/admin/users/{user}/edit', [ UserController::class, 'edit'])
            ->name('edit');
        Route::put('/admin/users/{user}', [ UserController::class, 'update'])
            ->name('update');
        Route::get('/admin/users/{user}', [ UserController::class, 'show'])
            ->name('admin.users.show');
        Route::delete('/admin/users/{user}', [ UserController::class, 'destroy'])
            ->name('destroy');
    });

    Route::get('/admin/roles', [ RoleController::class, 'index'])->name('roles.index');
    Route::get('/admin/roles/create', [ RoleController::class, 'create'])->name('roles.create');

    Route::post('/admin/roles', [ RoleController::class, 'store'])->name('roles.store');

});

Route::get('dashboard', \App\Http\Controllers\Blog\Dashboard::class)->name('dashboard');

Route::get('/blogs', [ App\Http\Controllers\Blog\BlogController::class, 'index'])
    ->name('blogs.index');

Route::get('/blogs/create', [ \App\Http\Controllers\Blog\BlogController::class, 'create'])
    ->name('blogs.create');

Route::post('/blogs', [ \App\Http\Controllers\Blog\BlogController::class, 'store'])
    ->name('blogs.store');


Route::get('/blogs/{blog}/posts', [ \App\Http\Controllers\Blog\PostController::class, 'index'])
    ->name('blogs.posts.index');

Route::get('/blogs/{blog}/posts/create', [ \App\Http\Controllers\Blog\PostController::class, 'create'])
    ->name('blogs.posts.create');

Route::post('/blogs/{blog}/posts', [ \App\Http\Controllers\Blog\PostController::class, 'store'])
    ->name('blogs.posts.store');


Route::get('/{username}/{blogName}', [\App\Actions\ShowBlog::class, 'handle']);



//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
