<?php


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


Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

// Route::get('/words', [App\Http\Controllers\WordController::class, 'index'])->name('home');

Route::middleware(['auth', 'isediter'])->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::middleware(['auth', 'isediter'])->get('/addword', [App\Http\Controllers\WordController::class, 'addword'])->name('addword');
Route::middleware(['auth', 'isediter'])->post('/createword', [App\Http\Controllers\WordController::class, 'create'])->name('createword');
Route::middleware(['auth', 'isediter'])->get('/edit', [App\Http\Controllers\WordController::class, 'edit'])->name('edit');
Route::middleware(['auth', 'isediter'])->get('/annotation', [App\Http\Controllers\AnnotationController::class, 'annotation'])->name('annotation');
Route::middleware(['auth', 'isediter'])->post('/editword', [App\Http\Controllers\WordController::class, 'editword'])->name('editword');
Route::middleware(['auth', 'isediter'])->get('/removeword/{id}', [App\Http\Controllers\WordController::class, 'update'])->name('removeword');
Route::middleware(['auth', 'isediter'])->get('/skip/{id}', [App\Http\Controllers\WordController::class, 'skip'])->name('skip');

Route::middleware(['auth', 'isadmin'])->get('/adduser', [App\Http\Controllers\UsersController::class, 'getAddUserPage'])->name('adduser');

Route::middleware(['auth', 'isadmin'])->post('/storeuser', [App\Http\Controllers\UsersController::class, 'store'])->name('storeuser');

Route::middleware(['auth', 'isadmin'])->get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');

Route::middleware(['auth', 'isadmin'])->get('/users/show/{id}', [App\Http\Controllers\UsersController::class, 'show'])->name('user.show');

Route::middleware(['auth', 'isadmin'])->post('/updateuser', [App\Http\Controllers\UsersController::class, 'edit'])->name('user.edit');

Route::middleware(['auth', 'isadmin'])->get('/users/delete/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('user.delete');

Route::middleware(['auth', 'isadmin'])->get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('admin.dashboard');

Route::middleware(['auth', 'isadmin'])->get('/words/untouched', [App\Http\Controllers\WordController::class, 'untouched'])->name('words.untouched');
Route::middleware(['auth', 'isadmin'])->get('/users/contributions/{id}', [App\Http\Controllers\UsersController::class, 'contributions'])->name('users.contributions');
Route::middleware(['auth', 'isadmin'])->get('/words/loaded', [App\Http\Controllers\WordController::class, 'loaded'])->name('words.loaded');
Route::middleware(['auth', 'isadmin'])->get('/words/edited', [App\Http\Controllers\WordController::class, 'edited'])->name('words.edited');
Route::middleware(['auth'])->get('/words/show/{id}', [App\Http\Controllers\WordController::class, 'show'])->name('words.show');
Route::middleware(['auth', 'isadmin'])->post('/words/admin/edit', [App\Http\Controllers\WordController::class, 'updateWord'])->name('words.update');

Route::middleware(['auth', 'isediter'])->post('/addhomograph', [App\Http\Controllers\HomographController::class, 'create'])->name('addhomograph');
Route::middleware(['auth', 'isediter'])->post('/sentence/edit/{id}', [App\Http\Controllers\AnnotationController::class, 'edit'])->name('sentence.edit');
Route::middleware(['auth', 'isediter'])->get('/sentence/skip/{id}', [App\Http\Controllers\AnnotationController::class, 'skip'])->name('sentence.skip');
Route::middleware(['auth', 'isediter'])->get('/sentence/previouse/{id}', [App\Http\Controllers\AnnotationController::class, 'previouse'])->name('sentence.previouse');
Route::middleware(['auth', 'isediter'])->get('/sentence/remove/{id}', [App\Http\Controllers\AnnotationController::class, 'remove'])->name('sentence.remove');
Route::middleware(['auth', 'isediter'])->get('/sentence/next/{id}', [App\Http\Controllers\AnnotationController::class, 'next'])->name('sentence.next');
Route::middleware(['auth', 'isediter'])->post('/sentence/change_all', [App\Http\Controllers\AnnotationController::class, 'changeAllTags'])->name('sentence.change_all');
Route::middleware(['auth', 'isediter'])->get('/sentence/search', [App\Http\Controllers\AnnotationController::class, 'search'])->name('sentence.search');
