<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function getAllTasks()
    {
        $tasks = DB::table('tasks')
            ->join('users', 'users.id', 'tasks.user_id')
            ->select('tasks.*', 'users.name as username')
            ->get();

        return view('tasks.getAllTasksView', compact('tasks'));

    }

    public function viewTask($id)
    {

        //query que vai buscar a tarefa que estou a clicar
        $task = DB::table('tasks')

            ->where('id', $id)

            ->first();
        //dd($task);

        return view('tasks.view_task', compact('task'));


    }

    public function deleteTask($id)
    {

        //definição de comportamento dos dados da tabela tasks
        // quando houver um delele do user associado a uma task.
        //  caso contrário, não permite a exclusão.
        // Db::table('users')
        //     ->where('user_id', $id)
        //     ->delete();


        Db::table('tasks')
            ->where('id', $id)
            ->delete();

        return back();
    }



}










