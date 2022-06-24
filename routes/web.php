<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Department;
use App\Http\Controllers\ICLibraryController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\HODController;
use App\Http\Controllers\ICProgressController;
use App\Http\Controllers\ResearchCellController;
use App\Http\Controllers\ClearanceFormController;

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
    return redirect('/theme-login');
});

Route::get('/theme-register', function () {
    return view('theme.auth.register');
});

Route::get('/theme-login', function () {
    return view('theme.auth.login');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/ic-library-students-table', [ICLibraryController::class, 'getStudentsTable'])->middleware(['isLibrarian'])->name('icLibraryStudentsTable');
    Route::get('/hod-students-table', [HODController::class, 'getStudentsTable'])->middleware(['isHOD'])->name('hodStudentsTable');
    Route::get('/research-cell-students-table', [ResearchCellController::class, 'getStudentsTable'])->middleware(['isResearchCell'])->name('researchCellStudentsTable');
    Route::get('/ic-progress-students-table', [ICProgressController::class, 'getStudentsTable'])->middleware(['isICProgress'])->name('icProgressStudentsTable');
    Route::get('/accounts-students-table', [AccountsController::class, 'getStudentsTable'])->middleware(['isAccountant'])->name('accountsStudentsTable');
    Route::get('/clearance-form', [ClearanceFormController::class, 'index'])->middleware(['isStudent'])->name('clearanceForm');

});



Route::get('/test', function () {
    // $user = Department::find(1)->users()->where('department_code', 'G-001')->get();
    // $user->departments()->attach(3);
    // dd($user->departments);
    $user = Department::where('department_name', 'I/C Library')->first()->users()->get();
    // $user = user::find(1)->departments()->where('department_code', 'G-001')->get();
    dd($user[0]->pivot);
    foreach ($user->departments as $department) {
        echo $department;
    }
});

// Route::get('/app', function () {
//     return view('theme.app');
// })->middleware(['auth'])->name('app');

// Route::get('/clearance', function () {
//     return view('theme.student.clearanceForm');
// })->middleware(['auth'])->name('clearance');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
