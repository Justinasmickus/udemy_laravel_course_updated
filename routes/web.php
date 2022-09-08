<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', WelcomeController::class);

Route::controller(ContactController::class)->name('contacts.')->group(function(){
    Route::get('/contacts', [ContactController::class,'index'])->name('index');
    Route::get('/contacts/create', [ContactController::class,'create'])->name('create');
    Route::get('/contacts/{id}', [ContactController::class, 'show'])->whereNumber('id')->name('show');
});
    



Route::fallback(function (){
    return "<h1>Sorry, this page does not exist :( </h1>";
});

// Route::get('/companies/{name?}', function($name = null){
//     if ($name) {
//         return "Company " . $name;
//     } else {
//         return "All companies";
//     }
// })->whereAlphaNumeric('name'); // alphabetical symbols and numbers