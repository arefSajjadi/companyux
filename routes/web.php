<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Search\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::prefix('search')->group(function () {
    Route::get('/', [SearchController::class, 'suggestionSearch'])->name('search.suggestion');
    Route::get('/result', [SearchController::class, 'searchResult'])->name('search.result');
});

Route::prefix('companies')->group(function () {
    Route::get('/', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/{company}', [CompanyController::class, 'show'])->name('companies.show');
});

Route::middleware('auth')->group(function () {
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'dashboard'])->name('profile.dashboard');

        Route::prefix('companies')->group(function () {
            Route::get('/create', [CompanyController::class, 'create'])->name('companies.create');
            Route::post('/store', [CompanyController::class, 'store'])->name('companies.store');
            Route::delete('/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');

            Route::prefix('{company}/comments')->group(function () {
                Route::get('/create', [CommentController::class, 'create'])->name('comments.create');
                Route::post('/store', [CommentController::class, 'store'])->name('comments.store');
                Route::patch('/{comment}', [CommentController::class, 'update'])->name('comments.update');
                Route::delete('/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
            });

        });

        Route::get('/myCompanies', [CompanyController::class, 'myCompanies'])->name('companies.myCompanies');

        Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');


    });
});
