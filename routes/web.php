<?php

use App\Http\Controllers\AuthController;
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

Route::get('auth/callback', [AuthController::class, 'callbackYRUPassport'])->name('auth.callbackYRUPassport');
Route::get('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/', function () {
    return view('welcome');
});



use App\Http\Controllers\YearController;
Route::resource('year', YearController::class);

use App\Http\Controllers\FundingController;
Route::resource('funding', FundingController::class);

use App\Http\Controllers\AgencyController;
Route::resource('agency', AgencyController::class);

use App\Http\Controllers\ResearchtypeController;
Route::resource('researchtype', ResearchtypeController::class);

use App\Http\Controllers\StrategicController;
Route::resource('strategic', StrategicController::class);

use App\Http\Controllers\IssuessController;
Route::resource('issuess', IssuessController::class);

use App\Http\Controllers\ResearchfieldController;
Route::resource('researchfield', ResearchfieldController::class);

use App\Http\Controllers\AnnounceController;
Route::resource('announce', AnnounceController::class);

use App\Http\Controllers\ProjectController;
Route::resource('project', ProjectController::class);
Route::get('autocomplete', [ProjectController::class, 'autocomplete'])->name('autocomplete');
Route::get('project/{id}/',[ProjectController::class, 'edit'])->name('project.edit');
Route::post('/update/{id}/', [ProjectController::class, 'update'])->name('project.update');
Route::get('project/{id}/',[ProjectController::class, 'show'])->name('project.show');

Route::get('svp/dashboard',[ProjectController::class, 'index1'])->name('svp.dashboard');
Route::get('getissuess',[ProjectController::class, 'getissuess'])->name('getissuess');
Route::post('save-multiple-files',[ProjectController::class, 'store'])->name('project.store');
Route::get('svp/project/{id}/', [ProjectController::class, 'show1'])->name('svp.project.show');
Route::post('svp/project/store', [ProjectController::class, 'store1'])->name('svp.project.store');
Route::get('svp/project/create', [ProjectController::class, 'create1'])->name('svp.project.create');
Route::post('svp/update/{id}/', [ProjectController::class, 'update1'])->name('svp.update');

use App\Http\Controllers\ContractController;
Route::resource('contract', ContractController::class);
Route::post('/update/{id}/', [ContractController::class, 'update'])->name('contract.update');
Route::get('file', [ContractController::class, 'create']);
Route::post('file', [ContractController::class, 'store'])->name('contract.store');
Route::get('svp/contract',[ContractController::class, 'index1'])->name('svp.contract.index');
Route::get('svp/contract/{id}/', [ContractController::class, 'show1'])->name('svp.contract.show');


