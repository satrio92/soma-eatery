<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Menu;

// Public routes
Route::get('/', function () {
    $categories = Category::with('menus')->get();
    $menus = Menu::with('category')->where('is_available', true)->get();
    return view('welcome', compact('categories', 'menus'));
});

// Admin routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        $totalMenus = Menu::count();
        $totalCategories = Category::count();
        return view('admin.dashboard', compact('totalMenus', 'totalCategories'));
    })->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('menus', MenuController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
