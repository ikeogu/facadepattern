<?php



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

Route::get('/cache', function () {
    return Cache::get('key');
});


Auth::routes();



Route::get('/home', 'HomeController@index');
Route::get('/myplan', 'TransactionController@myplan')->name('myPlan');
Route::resource('user', 'UserController');
Route::resource('transaction', 'TransactionController');
Route::get('/trasaction/{key}/currency','Plans@update')->name('curr');

Route::get('/', 'Plans@plans')->name('post');
Route::get('/plan/{key?}', 'Plans@plan')->name('plan');
Route::get('/upgrade', 'Plans@planUpgrade')->name('planu');






