<?php

use App\Http\Controllers\ParcelleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('parcelles.index');
});

// Route resource = génère automatiquement les 7 routes CRUD :
// index, create, store, show, edit, update, destroy
Route::resource('parcelles', ParcelleController::class);