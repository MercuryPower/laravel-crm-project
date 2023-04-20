<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function ()
{

    Route::get('/users', [\App\Http\Controllers\UserController::class, 'getUsers'])->name('users');
    Route::get('/leads/create', [LeadController::class, 'create'])->name('leads.create');
    Route::get('/leads', [LeadController::class, 'getLeads'])->name('leads');
    Route::get('/leads/edit/{id}', [LeadController::class, 'edit'])->name('leads.edit');
    Route::post('/leads/update/{id}', [LeadController::class, 'update'])->name('leads.update');
    Route::post('/leads/store', [LeadController::class, 'add'])->name('leads.add');

    Route::get('/clients', [ClientController::class, 'getClients'])->name('clients');
    Route::get('/clients/delete/{id}', [ClientController::class, 'delete'])->name('clients.delete')->middleware('can:Возможность удалять клиентов');
    Route::get('/clients/edit/{id}', [ClientController::class, 'edit'])->name('clients.edit')->middleware('can:Возможность редактировать клиентов');
    Route::post('/clients/update/{id}', [ClientController::class, 'update'])->name('clients.update')->middleware('can:Возможность редактировать клиентов');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create')->middleware('can:Возможность добавлять клиентов');
    Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store')->middleware('can:Возможность добавлять клиентов');

    Route::get('/departments', [DepartmentsController::class, 'getDepartments'])->name('departments');
    Route::get('/departments/create', [DepartmentsController::class, 'create'])->name('departments.create');
    Route::post('/departments/store', [DepartmentsController::class, 'store'])->name('departments.store');
    Route::get('/departments/delete/{id}', [DepartmentsController::class, 'delete'])->name('departments.delete');
    Route::get('/departments/edit/{id}', [DepartmentsController::class, 'edit'])->name('departments.edit');
    Route::post('/departments/update/{id}', [DepartmentsController::class, 'update'])->name('departments.update');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


//    Route::resource('/',RoleController::class)
    Route::get('/roles', [RoleController::class, 'getRoles'])->name('roles')->middleware('role:super-user');;
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/delete/{id}', [RoleController::class, 'delete'])->name('roles.delete');
    Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');


});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
