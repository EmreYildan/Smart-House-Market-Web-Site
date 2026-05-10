<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    $search = request('search');
    $category = request('category');

    $products = Product::with(['category', 'reviews'])
        ->where('is_active', true)
        ->when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        })
        ->when($category, function ($query, $category) {
            $query->where('category_id', $category);
        })
        ->latest()
        ->paginate(9)
        ->withQueryString();

    $categories = \App\Models\Category::all();

    return view('welcome', compact('products', 'search', 'categories', 'category'));
});

Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->middleware('auth')->name('user.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::post('/orders/{order}/received', [OrderController::class, 'received'])->name('orders.received');
    Route::post('/profile/deactivate', [ProfileController::class, 'deactivate'])->name('profile.deactivate');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{item}', [CartController::class, 'remove'])->name('cart.remove');

    Route::get('/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');

    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/favorites/{product}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');

    Route::post('/reviews/{product}', [ReviewController::class, 'store'])->name('reviews.store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);

    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::post('/orders/{order}/approve', [AdminOrderController::class, 'approve'])->name('admin.orders.approve');
    Route::post('/orders/{order}/next-status', [AdminOrderController::class, 'nextStatus'])->name('admin.orders.nextStatus');

    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
});

require __DIR__.'/auth.php';
