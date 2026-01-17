<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PrendasController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilController;
use App\Http\Controllers\HomeController;

Route::get('/welcome', function () {
    return view('welcome');
})->name('utils.welcome');

Route::get('/', [UtilController::class, 'home'])
    ->name('utils.welcome'); //dar nome para a rota

Route::get('/hello', function () {
    return view('utils.helloView');
})->name('utils.hello');//dar nome para a rota

Route::get('/turma/{nomeTurma}', function ($nomeTurma) {
    //ir a base de dados e buscar a info da turma
    return view('utils.turmaView', compact('nomeTurma'));
})->name('turma.name');



//ROTAS DO USER

//abre a listagem de todos os usuario
Route::get('/allusers', [UserController::class, 'allUsers'])->name('users.all');

//rota que abre a view com toda a info do user
Route::get('/viewuser/{id}', [UserController::class, 'viewUser'])->name('users.view');

//rota GET para visualizar o formulário vazio para inserir novo user
Route::get('/addUsers', [UserController::class, 'addUser'])->name('users.add');

//rota POST que pega os dados do formulário e envia para o servidor
Route::post('/store-user', [UserController::class, 'storeUser'])->name('users.store');

//roto para atualizar o usuario
Route::put('/updateUser',[UserController::class, 'updateUser'])->name('users.update');

//rota que apaga o user
Route::get('/deleteuser/{id}', [UserController::class, 'deleteUser'])->name('users.delete');




Route::get('/insertintodb', [UserController::class, 'insertUserIntoDB']);
Route::get('/updateintodb', [UserController::class, 'UpdateIntoDB']);
Route::get('/deleteUserFromDB', [UserController::class, 'deleteUserFromDB']);
Route::get('/selectusersfromdb', [UserController::class, 'selectUsersFromDB']);



// ROTAS DE TASK


Route::get('/addTask', [TaskController::class, 'addTask'])->name('tasks.add');

Route::post('/addTask', [TaskController::class, 'storeTask'])->name('tasks.store');

Route::get('/all_tasks', [TaskController::class, 'allTasks'])->name('tasks.all')->middleware('auth');

//rota que abre a view com a info da task
Route::get('/viewTask/{id}', [TaskController::class, 'viewTask'])->name('tasks.view');

//roto para atualizar a tarefa
Route::put('/updateTask',[TaskController::class, 'updateTask'])->name('tasks.update');

//rota que apaga a task
Route::get('/deletetask/{id}', [TaskController::class, 'deleteTask'])->name('tasks.delete');



//ROTAS PRENDA DE NATAL

Route::get('/allPrendas', [PrendasController::class, 'AllPrendas'])->name('prendas.all');
Route::get('/viewPrenda/{id}', [PrendasController::class, 'viewPrenda'])->name('prendas.view');
Route::get('/deleteprenda/{id}', [PrendasController::class, 'deletePrenda'])->name('prendas.delete');




Route::get('/backOffice', [DashboardController::class, 'homeDashboard'])->name('dashboard.backoffice')->middleware('auth');


Route::fallback(function () {
    return view('utils.fallbackView');
});
