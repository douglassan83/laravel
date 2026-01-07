<?php

use App\Http\Controllers\PrendasController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilController;

Route::get('/', [UtilController::class, 'home'])
    ->name('utils.welcome'); //dar nome para a rota

Route::get('/hello', function () {
    return view('utils.helloView');
})->name('utils.hello');//dar nome para a rota

Route::get('/turma/{nomeTurma}', function ($nomeTurma) {
    //ir a base de dados e buscar a info da turma
    return view('utils.turmaView', compact('nomeTurma'));
})->name('turma.name');


Route::get('/adicionarusers', [UserController::class, 'addUser'])->name('users.add');

Route::get('/insertintodb', [UserController::class, 'insertUserIntoDB']);

Route::get('/updateintodb', [UserController::class, 'UpdateIntoDB']);

Route::get('/deleteUserFromDB', [UserController::class, 'deleteUserFromDB']);

Route::get('/selectusersfromdb', [UserController::class, 'selectUsersFromDB']);





Route::get('/allusers', [UserController::class, 'allUsers'])->name('users.all');

//rota que abre a view com toda a info do user
Route::get('/viewuser/{id}', [UserController::class, 'viewUser'])->name('users.view');

//rota que apaga o user
Route::get('/deleteuser/{id}', [UserController::class, 'deleteUser'])->name('users.delete');






Route::get('/addTask', [TaskController::class, 'addTask'])->name('tasks.add');

Route::post('/addTask', [TaskController::class, 'store'])->name('tasks.store');

Route::get('/getAllTasks', [TaskController::class, 'getAllTasks'])->name('tasks.all');

//rota que abre a view com a info da task
Route::get('/viewTask/{id}', [TaskController::class, 'viewTask'])->name('tasks.view');

//rota que apaga a task
Route::get('/deletetask/{id}', [TaskController::class, 'deleteTask'])->name('tasks.delete');






Route::get('/allPrendas', [PrendasController::class, 'AllPrendas'])->name('prendas.all');
Route::get('/viewPrenda/{id}', [PrendasController::class, 'viewPrenda'])->name('prendas.view');
Route::get('/deleteprenda/{id}', [PrendasController::class, 'deletePrenda'])->name('prendas.delete');








Route::fallback(function () {
    return view('utils.fallbackView');
});
