<?php
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\ReportController;



Route::get('/', function () {
    return redirect('/products');
});

// Support Pages
Route::get('/support', function () {
    return view('support.support');
});
Route::get('/contact', function () {
    return view('support.contact');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/faq', function() { 
    return view('support.faq'); 
});

// Product Routes
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/category/{category}/{sub_category?}', [ProductController::class, 'category']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/deals', [ProductController::class, 'deals']);
Route::get('/add/{product}/{quantity?}', [ProductController::class, 'addBasketItem'])->middleware('auth');
Route::get('/reduce/{product}', [ProductController::class, 'reduceBasketItem'])->middleware('auth');
Route::get('/remove/{id}', [ProductController::class, 'removeBasketItem'])->middleware('auth');
Route::get('/checkout', [ProductController::class, 'checkout'])->middleware('auth');
Route::post('/checkout', [ProductController::class, 'saveOrder'])->middleware('auth');
Route::get('/orders/{id}', [OrderController::class, 'show'])->middleware('auth');
Route::get('/orders/{id}/{status?}', [AdminCustomerController::class, 'change_order_status']);
Route::get('/orders', [OrderController::class, 'index'])->middleware('auth');
Route::post('/review/{id}', [ProductController::class, 'review'])->middleware('auth');
Route::get('/search', [ProductController::class, 'search'])->name('search');

// User Dashboard (Customer)
Route::get('/edit/user/{id}', [UserController::class, 'edit'])->middleware('auth');

Route::get('/edit/product/{id}', [ProductController::class, 'editProduct'])->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// **Admin routes manually check if admin role**
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    // Customers Management
    Route::get('/customers', [AdminCustomerController::class, 'index'])->name('admin.customers.index');

    Route::get('/customers/{id}/edit', [AdminCustomerController::class, 'edit'])->name('admin.customers.edit');

    Route::put('/customers/{id}', [AdminCustomerController::class, 'update'])->name('admin.customers.update');

    Route::delete('/customers/{id}', [AdminCustomerController::class, 'destroy'])->name('admin.customers.destroy');

    // Inventory Management Routes
    Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
        Route::get('/inventory', [InventoryController::class, 'index'])->name('admin.inventory.index');
        Route::get('/inventory/{id}/edit', [InventoryController::class, 'edit'])->name('admin.inventory.edit');
        Route::put('/inventory/{id}', [InventoryController::class, 'update'])->name('admin.inventory.update');
        Route::delete('/inventory/{id}', [InventoryController::class, 'destroy'])->name('admin.inventory.delete');
    });

    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products/store', [ProductController::class, 'store'])->name('admin.products.store');

    Route::get('/admin/products/{id}', [ProductController::class, 'show'])->name('admin.products.show');

    Route::get('/admin/low-stock', [ProductController::class, 'lowStock'])->name('admin.lowstock');


});

require __DIR__.'/auth.php';
