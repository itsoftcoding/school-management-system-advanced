<?php

use App\Http\Controllers\Admin\Students\FeeCategoryAmountController;
use App\Http\Controllers\Admin\Subjects\SubjectAssignController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Employees\Designations\Designation;
use App\Http\Livewire\Admin\Exams\ExamTypes\ExamType;
use App\Http\Livewire\Admin\Students\Classes\StudentClass;
use App\Http\Livewire\Admin\Students\FeeCategory\StudentFeeCategory;
use App\Http\Livewire\Admin\Students\FeeCategoryAmount\FeeCategoryAmount;
use App\Http\Livewire\Admin\Students\Groups\StudentGroup;
use App\Http\Livewire\Admin\Students\Shifts\StudentShift;
use App\Http\Livewire\Admin\Students\Student;
use App\Http\Livewire\Admin\Students\Years\StudentYear;
use App\Http\Livewire\Admin\Subjects\Subject;
use App\Http\Livewire\Admin\Subjects\SubjectAssigns\SubjectAssign;
use App\Http\Livewire\Admin\Users\User;


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

Route::prefix('/admin')->middleware(['auth'])->name('admin.')->group(function(){
    Route::get('/dashboard',Dashboard::class)->name('dashboard');
    Route::get('/users',User::class)->name('user');

    Route::prefix('/students')->name('student')->group(function(){
        Route::get('',Student::class);
        Route::get('/classes',StudentClass::class)->name('.class');
        Route::get('/years',StudentYear::class)->name('.year');
        Route::get('/groups',StudentGroup::class)->name('.group');
        Route::get('/shifts',StudentShift::class)->name('.shift');
        Route::get('/fee-categories',StudentFeeCategory::class)->name('.fee_category');
        Route::get('/fee-category-amount',FeeCategoryAmount::class)->name('.fee_category_amount');

        Route::prefix('/fee-category-amounts')->name('.fee_category_amount.')->group(function(){
            Route::get('/',[FeeCategoryAmountController::class, 'index'])->name('index');
            Route::get('/create',[FeeCategoryAmountController::class, 'create'])->name('create');
            Route::post('/store',[FeeCategoryAmountController::class, 'store'])->name('store');
            Route::get('/show/{id}',[FeeCategoryAmountController::class, 'show'])->name('show');
            Route::get('/edit/{id}',[FeeCategoryAmountController::class, 'edit'])->name('edit');
            Route::post('/update/{id}',[FeeCategoryAmountController::class, 'update'])->name('update');
        });
    });

    Route::prefix('/subjects')->name('subject')->group(function(){
        Route::get('/',Subject::class);
        Route::get('/subject-assign',SubjectAssign::class)->name('.subject_assign');
        Route::prefix('/subject-assigns')->name('.subject_assign.')->group(function(){
            Route::get('/',[SubjectAssignController::class,'index'])->name('index');
            Route::get('/create',[SubjectAssignController::class,'create'])->name('create');
            Route::post('/store',[SubjectAssignController::class,'store'])->name('store');
            Route::get('/show/{id}',[SubjectAssignController::class,'show'])->name('show');
            Route::get('/edit/{id}',[SubjectAssignController::class,'edit'])->name('edit');
            Route::post('/update/{id}',[SubjectAssignController::class,'update'])->name('update');
        });
    });

    Route::prefix('/exams')->name('exam.')->group(function () {
        Route::get('/exam-types', ExamType::class)->name('exam_type');
    });

    Route::prefix('/employees')->name('employee.')->group(function () {
        Route::get('/designations', Designation::class)->name('designation');
    });

    // for testing with controller if will successfully done then create livewire component . ok

});
