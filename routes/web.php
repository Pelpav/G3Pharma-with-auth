<?php

use App\Http\Controllers\EmployeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicamentController;

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

Auth::routes();

Route::get('auth/home', [App\Http\Controllers\Auth\HomeController::class, 'index'])->name('auth.home')->middleware('isAdmin');
Route::get('user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');

// CREATE

Route::post('/employe/create', [EmployeController::class, 'createEmploye'])->name('employe.create');

Route::post('/medicament/create', [MedicamentController::class, 'createMedicament'])->name('medicament.create');

// FIN CREATE





// READ

// BY ID

Route::get('/getemploye/{id}', [EmployeController::class, 'getEmployeById'])->name('getemployebyid');

Route::get('/getmedicament/{id}', [MedicamentController::class, 'getMedicamentById'])->name('getmedicamentbyid');

// GET ALL

Route::get('/getemploye', [EmployeController::class, 'getAllEmploye'])->name('getallemploye');

Route::get('/getmedicament', [MedicamentController::class, 'getAllMedicament'])->name('getallmedicament');

// FIN READ





// UPDATE

Route::post('/updateemploye/{id}', [EmployeController::class, 'updateEmploye'])->name('updateemploye');
Route::post('/updatemedicament/{id}', [MedicamentController::class, 'updateMedicament'])->name('updatemedicament');


// FIN UPDATE





// DELETE

Route::get('/delemployee/{id}', [EmployeController::class, 'delEmploye'])->name('delemployee');

Route::get('/delmedicament/{id}', [MedicamentController::class, 'delMedicament'])->name('delmedicament');

// FIN DELETE




// Afficher le forrm employes
Route::get('/formEmploye', [EmployeController::class, 'showCreateForm'])->name('formEmploye');


// Liste employes
Route::get('/employes', [EmployeController::class, 'getAllEmploye'])->name('employe.list');


// Afficher le forrm médicaments
Route::get('/formMedicament', [MedicamentController::class, 'showCreateForm'])->name('formMedicament');


// Liste medicaments
Route::get('/medicaments', [MedicamentController::class, 'getAllMedicament'])->name('medicament.list');


// Ajouter du stock à un médicament
Route::get('/addstock/{id}', [MedicamentController::class, 'addStock'])->name('addStock');

// Retirer du stock à un médicament
Route::get('/removestock/{id}', [MedicamentController::class, 'removeStock'])->name('removeStock');

Route::get('/editemploye/{id}', [EmployeController::class, 'editEmploye'])->name('editemploye');
