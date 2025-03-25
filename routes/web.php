<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\GarmentController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MaterialController;

Route::get('/', function () {
    if (auth()->check()) {
        logger('User is authenticated. Redirecting to index.');
        return redirect()->route('index');
    }
    logger('User is not authenticated. Redirecting to login.');
    return redirect()->route('login');
});


Route::get('/index', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('index');

Route::middleware('auth')->group(function () {

    /* Profile Routes */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class])->name('profile.destroy');

    /* Customer Routes */
    Route::get('/customer', [CustomerController::class, 'loadAllCustomers'])->name('customers.index');
    Route::get('/customer/add', [CustomerController::class, 'loadAddForm'])->name('customers.loadAddForm');
    Route::post('/customer/add', [CustomerController::class, 'addCustomer'])->name('customers.add');
    Route::get('/customer/edit/{id}', [CustomerController::class, 'loadEditCustomerForm'])->name('customers.loadEditCustomerForm');
    Route::get('/customer/edit/status/{id}', [CustomerController::class, 'updateStatus'])->name('customers.updateStatus');
    Route::post('/customer/edit', [CustomerController::class, 'editCustomer'])->name('customers.edit');
    Route::get('/customer/delete/{id}', [CustomerController::class, 'delete'])->name('customers.delete');

    /* Material Routes */
    Route::get('/material', [MaterialController::class, 'loadAll'])->name('materials.index');
    Route::get('/material/add', [MaterialController::class, 'loadAddForm'])->name('materials.loadAddForm');
    Route::post('/material/add', [MaterialController::class, 'add'])->name('materials.add');
    Route::get('/material/edit/{id}', [MaterialController::class, 'loadEditForm'])->name('materials.loadEditForm');
    Route::post('/material/edit', [MaterialController::class, 'edit'])->name('materials.edit');
    Route::get('/material/delete/{id}', [MaterialController::class, 'delete'])->name('materials.delete');

    /* Machine Routes */
    Route::get('/machine', [MachineController::class, 'loadAll'])->name('machines.index');
    Route::get('/machine/add', [MachineController::class, 'loadAddForm'])->name('machines.loadAddForm');
    Route::post('/machine/add', [MachineController::class, 'add'])->name('machines.add');
    Route::get('/machine/edit/{id}', [MachineController::class, 'loadEditForm'])->name('machines.loadEditForm');
    Route::post('/machine/edit', [MachineController::class, 'edit'])->name('machines.edit');
    Route::get('/machine/edit/status/{id}', [MachineController::class, 'updateStatus'])->name('machines.updateStatus');
    Route::get('/machine/delete/{id}', [MachineController::class, 'delete'])->name('machines.delete');

    /* Garment Routes */
    Route::get('/garment', [GarmentController::class, 'loadAll'])->name('garments.index');
    Route::get('/garment/add', [GarmentController::class, 'loadAddForm'])->name('garments.loadAddForm');
    Route::post('/garment/add', [GarmentController::class, 'add'])->name('garments.add');
    Route::get('/garment/edit/{id}', [GarmentController::class, 'loadEditForm'])->name('garments.loadEditForm');
    Route::post('/garment/edit', [GarmentController::class, 'edit'])->name('garments.edit');
    Route::get('/garment/edit/status/{id}', [GarmentController::class, 'updateStatus'])->name('garments.updateStatus');
    Route::get('/garment/delete/{id}', [GarmentController::class, 'delete'])->name('garments.delete');

    /* Garment Machine Routes */

    Route::get('/garment/more/{id}', [GarmentController::class, 'show'])->name('garments.more');
    Route::get('/garment/more/machine/add/{id}', [GarmentController::class, 'loadAddGarmentMachineForm'])->name('garment.machine.loadAddGarmentMachineForm');
    Route::post('/garment/more/machine/add', [GarmentController::class, 'addGarmentMachine'])->name('garment.machine.add');
    Route::get('/garment/more/machine/edit/{id}', [GarmentController::class, 'loadEditGarmentMachineForm'])->name('garment.machine.loadEditGarmentMachineForm');
    Route::post('/garment/more/machine/edit', [GarmentController::class, 'editGarmentMachine'])->name('garment.machine.edit');
    Route::get('/garment/more/machine/delete/{id}', [GarmentController::class, 'deleteGarmentMachine'])->name('garment.machine.delete');

    /* Garment Material Routes */

    Route::get('/garment/more/material/add{id}', [GarmentController::class, 'loadAddGarmentMaterialForm'])->name('garment.material.loadAddGarmentMaterialForm');
    Route::post('/garment/more/material/add', [GarmentController::class, 'addGarmentMaterial'])->name('garment.material.add');
    Route::get('/garment/more/material/edit/{id}', [GarmentController::class, 'loadEditGarmentMaterialForm'])->name('garment.material.loadEditGarmentMaterialForm');
    Route::post('/garment/more/material/edit/', [GarmentController::class, 'editGarmentMaterial'])->name('garment.material.edit');
    Route::get('/garment/more/material/delete/{id}', [GarmentController::class, 'deleteGarmentMaterial'])->name('garment.material.delete');

    /* Order Routes */

    Route::get('/order', [OrderController::class, 'loadAll'])->name('orders.index');
    Route::get('/order/add', [OrderController::class, 'loadAddForm'])->name('orders.loadAddForm');
    Route::post('/order/add', [OrderController::class, 'add'])->name('orders.add');
    Route::get('/order/edit/{id}', [OrderController::class, 'loadEditForm'])->name('orders.loadEditForm');
    Route::post('/order/edit/{id}', [OrderController::class, 'edit'])->name('orders.edit');
    Route::get('/order/status/{id}', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::get('/order/delete/{id}', [OrderController::class, 'delete'])->name('orders.delete');

    /* Costs Routes */

    Route::get('/costs', [CostController::class, 'index'])->name('costs.index');
    Route::get('/costs/generate/{orderId}', [CostController::class, 'generateCost'])->name('costs.generate');

    /* Users Routes */

    Route::get('/users', [UserController::class, 'showUsers'])->name('users.index');
    Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.destroy');
});

require __DIR__.'/auth.php';
