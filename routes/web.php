<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentoController;
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

Route::get('/', 'PagesController@index')->name('dashoard');
Route::get('estado', 'PagesController@estado')->name('estado');
Route::post('store', 'PagesController@store')->name('store');
Route::put('edit/{id}', 'PagesController@update')->name('doc.update');
Route::get('docs/{uuid}/download', 'PagesController@download')->name('docs.download');
Route::get('docs/{id}/edit', 'PagesController@edit')->name('docs.edit');


 /* Route::post('/', [DocumentoController::class, 'store'])->name('dashboard.store'); */

// Demo routes
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/jquerymask', 'PagesController@jQueryMask');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');
