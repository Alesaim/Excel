<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\FileUploadController;


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
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('file', [TestController::class, 'fileImportExport']);
Route::post('file_import', [TestController::class, 'fileImport'])->name('file-import');
Route::get('file_export', [TestController::class, 'fileExport'])->name('file-export');

//Drag and Drop
Route::get('dropzone', [DropzoneController::class, 'dropzone']);
Route::post('dropzone-store', [DropzoneController::class, 'dropzoneStore'])->name('dropzone.store');

// Ajax Drag & Drop
Route::get('dropzoneAjax', [FileUploadController::class, 'index']);
Route::post('dropzone/upload', [FileUploadController::class, 'upload'])->name('dropzone.upload');
Route::get('dropzone/fetch', [FileUploadController::class, 'fetch'])->name('dropzone.fetch');
Route::get('dropzone/delete', [FileUploadController::class, 'delete'])->name('dropzone.delete');


