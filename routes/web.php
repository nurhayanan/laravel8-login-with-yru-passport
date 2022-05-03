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


Auth::routes();
use App\Http\Controllers\HomeController;
Route::get('svp/dashboard', [HomeController::class, 'index'])->name('svp.dashboard');
Route::get('admin/dashboard', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');


use App\Http\Controllers\YearController;
Route::resource('admin/year', YearController::class);

use App\Http\Controllers\FundingController;
Route::resource('admin/funding', FundingController::class);

use App\Http\Controllers\AgencyController;
Route::resource('admin/agency', AgencyController::class);

use App\Http\Controllers\ResearchtypeController;
Route::resource('admin/researchtype', ResearchtypeController::class);

use App\Http\Controllers\StrategicController;
Route::resource('admin/strategic', StrategicController::class);

use App\Http\Controllers\IssuessController;
Route::resource('admin/issuess', IssuessController::class);

use App\Http\Controllers\ResearchfieldController;
Route::resource('admin/researchfield', ResearchfieldController::class);

use App\Http\Controllers\AnnounceController;
Route::resource('announce', AnnounceController::class);
Route::get('announce/{id}/',[AnnounceController::class, 'show'])->name('announce.show');

use App\Http\Controllers\ProjectController;
Route::resource('project', ProjectController::class);
Route::get('/autocomplete-search', [ProjectController::class, 'autocompleteSearch']);
Route::get('project/{id}/',[ProjectController::class, 'edit'])->name('project.edit');
Route::post('/update/{id}/', [ProjectController::class, 'update'])->name('project.update');
Route::get('project/{id}/',[ProjectController::class, 'show'])->name('project.show');


Route::get('svp/dashboard',[ProjectController::class, 'index1'])->name('svp.dashboard');
Route::get('getissuess',[ProjectController::class, 'getissuess'])->name('getissuess');
Route::post('file', [ContractController::class, 'store'])->name('project.store');
Route::get('svp/project/{id}/', [ProjectController::class, 'show1'])->name('svp.project.show');
Route::post('svp/project/store', [ProjectController::class, 'store1'])->name('svp.project.store');
Route::get('svp/project/create', [ProjectController::class, 'create1'])->name('svp.project.create');
Route::post('svp/update/{id}/', [ProjectController::class, 'update1'])->name('svp.update');

use App\Http\Controllers\ContractController;
Route::resource('contract', ContractController::class);
Route::get('contract/{id}/',[ContractController::class, 'show'])->name('contract.show');
Route::get('contract/{id}/',[ContractController::class, 'show2'])->name('contract.show2');
Route::get('generate-pdf', [ContractController::class, 'generatePDF']);
Route::get('generate-pdf1', [ContractController::class, 'generatePDF1']);
Route::get('file', [ContractController::class, 'create']);
Route::post('file', [ContractController::class, 'store'])->name('contract.store');
Route::get('svp/contract',[ContractController::class, 'index1'])->name('svp.contract.index');
Route::get('svp/contract/{id}/', [ContractController::class, 'show1'])->name('svp.contract.show');
Route::post('svp/contract/update/{id}/', [ContractController::class, 'contract_update'])->name('svp.update1');

use App\Http\Controllers\PersonController;
Route::resource('person', PersonController::class);
Route::get('person/{id}/',[PersonController::class, 'show'])->name('person.show');

use App\Http\Controllers\ProgressController;
Route::resource('progress', ProgressController::class);
Route::get('progress/{id}/',[ProgressController::class, 'show'])->name('progress.show');
Route::get('file', [ContractController::class, 'create']);
Route::post('file', [ContractController::class, 'store'])->name('contract.store');

