<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LeadsController;
use App\Http\Controllers\ProposalsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/leads', [LeadsController::class, 'leadsRecord'])->name('leads.record');
Route::post('/leads/save', [LeadsController::class, 'leadsRecordSave'])->name('leads.record.save');




Route::get('/proposals', [ProposalsController::class, 'proposalsRecords'])->name('proposals.record');
Route::post('/proposals/save', [ProposalsController::class, 'proposalsRecordsSave'])->name('proposals.record.save');
Route::post('/proposals/update/{id}', [ProposalsController::class, 'proposalsRecordsUpdate'])->name('proposals.update.edit');
Route::get('/proposals/delete/{id}', [ProposalsController::class, 'proposalsRecordsDelete'])->name('proposals.update.delete');

