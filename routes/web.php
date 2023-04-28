<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\ApartmentsController;

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

    Route::get('/users', [\App\Http\Controllers\UserController::class, 'getUsers'])->name('users')->middleware('role:super-user');
    Route::get('/leads/create', [LeadController::class, 'create'])->name('leads.create')->middleware('role:super-user|Lead-Specialist');
    Route::get('/leads', [LeadController::class, 'getLeads'])->name('leads')->middleware('role:super-user|Lead-Specialist');
    Route::get('/leads/edit/{id}', [LeadController::class, 'edit'])->name('leads.edit')->middleware('role:super-user|Lead-Specialist');
    Route::post('/leads/update/{id}', [LeadController::class, 'update'])->name('leads.update')->middleware('role:super-user|Lead-Specialist');
    Route::post('/leads/store', [LeadController::class, 'add'])->name('leads.add')->middleware('role:super-user|Lead-Specialist');

    Route::get('/clients', [ClientController::class, 'getClients'])->name('clients')->middleware('role:super-user|Client-Manager');
    Route::get('/clients/delete/{id}', [ClientController::class, 'delete'])->name('clients.delete')->middleware('role:super-user|Client-Manager');
    Route::get('/clients/edit/{id}', [ClientController::class, 'edit'])->name('clients.edit')->middleware('role:super-user|Client-Manager');
    Route::post('/clients/update/{id}', [ClientController::class, 'update'])->name('clients.update')->middleware('role:super-user|Client-Manager');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create')->middleware('role:super-user|Client-Manager');
    Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store')->middleware('role:super-user|Client-Manager');

    Route::get('/departments', [DepartmentsController::class, 'getDepartments'])->name('departments')->middleware('role:super-user|Head-of-Department');
    Route::get('/departments/create', [DepartmentsController::class, 'create'])->name('departments.create')->middleware('role:super-user|Head-of-Department');
    Route::post('/departments/store', [DepartmentsController::class, 'store'])->name('departments.store')->middleware('role:super-user|Head-of-Department');;
    Route::get('/departments/delete/{id}', [DepartmentsController::class, 'delete'])->name('departments.delete')->middleware('role:super-user|Head-of-Department');;
    Route::get('/departments/edit/{id}', [DepartmentsController::class, 'edit'])->name('departments.edit')->middleware('role:super-user|Head-of-Department');
    Route::post('/departments/update/{id}', [DepartmentsController::class, 'update'])->name('departments.update')->middleware('role:super-user|Head-of-Department');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


//    Route::resource('/',RoleController::class)
    Route::get('/roles', [RoleController::class, 'getRoles'])->name('roles')->middleware('role:super-user');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create')->middleware('role:super-user');
    Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store')->middleware('role:super-user');
    Route::get('/roles/delete/{id}', [RoleController::class, 'delete'])->name('roles.delete')->middleware('role:super-user');
    Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit')->middleware('role:super-user');
    Route::post('/roles/update/{id}', [RoleController::class, 'update'])->name('roles.update')->middleware('role:super-user');

    Route::get('/houses', [HouseController::class, 'getHouses'])->name('houses');


});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
