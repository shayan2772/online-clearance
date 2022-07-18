<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Department;
use App\Http\Controllers\ICLibraryController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\HODController;
use App\Http\Controllers\ICProgressController;
use App\Http\Controllers\ResearchCellController;
use App\Http\Controllers\ClearanceFormController;
use App\Http\Controllers\ClearanceStatusController;
use App\Http\Controllers\PDFController;

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



Route::get('/theme-register', function () {
    return view('theme.auth.register');
});

Route::get('/theme-login', function () {
    return view('theme.auth.login');
});

// Route::get('/pdf', function () {
//     return view('theme.student.clearanceCertificate');
// });

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        if (auth()->user()->role === 'Student'){
            return redirect('/clearance-form');
        }
        elseif (auth()->user()->role === 'I/C Library') {
            return redirect('/ic-library-students-table');
        }
        elseif (auth()->user()->role === 'HOD') {
            return redirect('/hod-students-table');
        }
        elseif (auth()->user()->role === 'Research Cell') {
            return redirect('/research-cell-students-table');
        }
        elseif (auth()->user()->role === 'I/C Progress') {
            return redirect('/ic-progress-students-table');
        }
        elseif (auth()->user()->role === 'Accounts') {
            return redirect('/accounts-students-table');
        }
        elseif (auth()->user()->role === 'Admin') {
            return redirect('/admin-students-table');
        }
        else {
            return redirect('/theme-login');
        }
    });

    Route::get('/ic-library-students-table', [ICLibraryController::class, 'getStudentsTable'])->middleware(['isLibrarian'])->name('icLibraryStudentsTable');
    Route::get('/hod-students-table', [HODController::class, 'getStudentsTable'])->middleware(['isHOD'])->name('hodStudentsTable');
    Route::get('/research-cell-students-table', [ResearchCellController::class, 'getStudentsTable'])->middleware(['isResearchCell'])->name('researchCellStudentsTable');
    Route::get('/ic-progress-students-table', [ICProgressController::class, 'getStudentsTable'])->middleware(['isICProgress'])->name('icProgressStudentsTable');
    Route::get('/accounts-students-table', [AccountsController::class, 'getStudentsTable'])->middleware(['isAccountant'])->name('accountsStudentsTable');
    Route::get('/admin-students-table', [AdminController::class, 'getStudentsTable'])->middleware(['isAdmin'])->name('adminStudentsTable');
    Route::get('/admin-cleared-students-table', [AdminController::class, 'getClearedStudentsTable'])->middleware(['isAdmin'])->name('adminClrearedStudentsTable');

    Route::get('/clearance-form', [ClearanceFormController::class, 'index'])->middleware(['isStudent'])->name('clearanceForm');

    Route::post('/submit-clearance-form', [ClearanceFormController::class, 'storeClearanceForm'])->middleware(['isStudent'])->name('submitClearanceForm');

    Route::get('/clearance-status', [ClearanceStatusController::class, 'index'])->middleware(['isStudent'])->name('clearanceStatus');

    Route::get('/account-unclear-student-status/{id}', [AccountsController::class, 'unclearStudentStatus'])->middleware(['isAccountant'])->name('accountUnclearStudentStatus');
    Route::get('/account-clear-student-status/{id}', [AccountsController::class, 'clearStudentStatus'])->middleware(['isAccountant'])->name('accountClearStudentStatus');
    Route::get('/account-submit-remarks', [AccountsController::class, 'submitRemarks'])->middleware(['isAccountant'])->name('accountSubmitRemarks');

    Route::get('/ic-library-unclear-student-status/{id}', [ICLibraryController::class, 'unclearStudentStatus'])->middleware(['isLibrarian'])->name('icLibraryUnclearStudentStatus');
    Route::get('/ic-library-clear-student-status/{id}', [ICLibraryController::class, 'clearStudentStatus'])->middleware(['isLibrarian'])->name('icLibraryClearStudentStatus');
    Route::get('/ic-library-submit-remarks', [ICLibraryController::class, 'submitRemarks'])->middleware(['isLibrarian'])->name('icLibrarySubmitRemarks');


    Route::get('/hod-account-unclear-student-status/{id}', [HODController::class, 'unclearStudentStatus'])->middleware(['isHOD'])->name('hodUnclearStudentStatus');
    Route::get('/hod-account-clear-student-status/{id}', [HODController::class, 'clearStudentStatus'])->middleware(['isHOD'])->name('hodClearStudentStatus');
    Route::get('/hod-submit-remarks', [HODController::class, 'submitRemarks'])->middleware(['isHOD'])->name('hodSubmitRemarks');

    Route::get('/research-cell-unclear-student-status/{id}', [ResearchCellController::class, 'unclearStudentStatus'])->middleware(['isResearchCell'])->name('researchCellUnclearStudentStatus');
    Route::get('/research-cell-student-status/{id}', [ResearchCellController::class, 'clearStudentStatus'])->middleware(['isResearchCell'])->name('researchCellClearStudentStatus');
    Route::get('/research-cell-submit-remarks', [ResearchCellController::class, 'submitRemarks'])->middleware(['isResearchCell'])->name('researchCellSubmitRemarks');

    Route::get('/ic-progress-unclear-student-status/{id}', [ICProgressController::class, 'unclearStudentStatus'])->middleware(['isICProgress'])->name('icProgressUnclearStudentStatus');
    Route::get('/ic-progress-student-status/{id}', [ICProgressController::class, 'clearStudentStatus'])->middleware(['isICProgress'])->name('icProgressClearStudentStatus');
    Route::get('/ic-progress-submit-remarks', [ICProgressController::class, 'submitRemarks'])->middleware(['isICProgress'])->name('icProgressSubmitRemarks');

    Route::get('generate-certificate', [PDFController::class, 'generatePDF'])->middleware(['isStudent'])->name('generateCertificate');

});


require __DIR__.'/auth.php';
