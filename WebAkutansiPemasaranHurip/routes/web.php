<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalesOrderController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DeliveryOrderController;
use App\Http\Controllers\SPMANSController;
use App\Http\Controllers\FakturPenjualanController;
use App\Http\Controllers\SPAINDController;
use App\Http\Controllers\SPANSUBController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('salesorders', SalesOrderController::class)->except(['edit', 'show']);
Route::resource('products', ProdukController::class);
Route::resource('customers', CustomerController::class);
Route::get('/salesorders/{id}', [SalesOrderController::class, 'detail'])->name('salesorders.detail');
Route::resource('forms', FormController::class);
Route::get('/forms/preview/{formId}/{salesOrderId}', [FormController::class, 'preview'])->name('forms.preview');
Route::resource('spmans', SPMANSController::class);
Route::resource('invoice', FakturPenjualanController::class);
Route::resource('deliveryorder', DeliveryOrderController::class);
Route::resource('spaind', SPAINDController::class);
Route::resource('spansub', SPANSUBController::class);

#company
Route::get('/company', [CompanyController::class, 'index'])->name('company.index');
Route::get('/company/{company}/edit', [CompanyController::class, 'edit'])->name('company.edit');
Route::put('/company/{company}', [CompanyController::class, 'update'])->name('company.update');

#spmans
Route::get('/spmans', [SPMANSController::class, 'index'])->name('spmans.index');
Route::get('/spmans/create/{formId}/{salesOrderId}', [SPMANSController::class, 'create'])->name('spmans.create');
Route::post('/spmans/store', [SPMANSController::class, 'store'])->name('spmans.store');
Route::get('/spmans/{spmansId}/edit', [SPMANSController::class, 'edit'])->name('spmans.edit');
Route::get('/form/preview/{formId}/{salesOrderId}/{spmansId}', [FormController::class, 'previewso'])->name('form.preview');

#Faktur Penjualan
Route::get('/invoice', [FakturPenjualanController::class, 'index'])->name('invoice.index');
Route::get('/invoice/create/{formId}/{salesOrderId}', [FakturPenjualanController::class, 'create'])->name('invoice.create');
Route::post('/invoice/store', [FakturPenjualanController::class, 'store'])->name('invoice.store');
Route::get('/form/preview/{formId}/{salesOrderId}/{invoiceId}', [FormController::class, 'previewso'])->name('form.preview2');

#SPAIND
Route::get('/spaind', [SPAINDController::class, 'index'])->name('spaind.index');
Route::get('/spaind/create/{formId}/{deliveryOrderId}', [SPAINDController::class, 'create'])->name('spaind.create');
Route::post('/spaind/store', [SPAINDController::class, 'store'])->name('spaind.store');
Route::get('/form/previewdo/{formId}/{deliveryOrderId}/{spaindId}', [FormController::class, 'previewdo'])->name('form.previewdo');


#SPANSUB
Route::get('/spansub', [SPANSUBController::class, 'index'])->name('spansub.index');
Route::get('/spansub/create/{formId}/{deliveryOrderId}', [SPANSUBController::class, 'create'])->name('spansub.create');
Route::post('/spansub/store', [SPANSUBController::class, 'store'])->name('spansub.store');
Route::get('/form/preview/{formId}/{deliveryOrderId}/{spansubId}', [FormController::class, 'previewdo'])->name('form.preview4');