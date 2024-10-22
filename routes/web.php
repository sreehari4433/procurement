<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;
use App\Models\Order;
use App\Models\Supplier;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
    Route::delete('/supplier/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
    Route::post('/item', [ItemController::class, 'store'])->name('item.store');
    Route::get('/items', [ItemController::class, 'index'])->name('item.index');
    Route::get('/item/create', [ItemController::class, 'create'])->name('item.create');
    Route::delete('/item/{id}', [ItemController::class, 'destroy']);

    // In web.php, bypass middleware if needed
    Route::get('/activesuppliers', function () {
        return response()->json(Supplier::where('status', 'Active')->get());
    });
    Route::post('/orders', [OrderController::class, 'store']);
    Route::delete('/orders/{id}', [OrderController::class, 'destroy']);

    // Optional: Route for listing all orders (GET)
    Route::get('/orders', [OrderController::class, 'index']);
});

require __DIR__.'/auth.php';
