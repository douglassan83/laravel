<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{
    public function AllTasks()
    {
        $tasks = DB::table('tasks')
            ->join('users', 'users.id', 'tasks.user_id')
            ->select('tasks.*', 'users.name as username')
            ->get();

        return view('tasks.all_tasks', compact('tasks'));

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

    public function addTask()
{
    $users = DB::table('users')->get();  // array de usuarios para selecionar na lista dropdown do formulario
    return view('tasks.add_task', compact('users'));
}

public function storeTask(Request $request)
{
    $request->validate([
        'nome' => 'required|string|max:50',
        'descricao' => 'required',
        'user_id' => 'required'
    ]);

    DB::table('tasks')->insert([
        'name' => $request->nome,           // ← name (DB)
        'description' => $request->descricao, // ← description (DB)
        'user_id' => $request->user_id
    ]);

    return redirect()->route('tasks.all')
        ->with('message', 'Tarefa criada com sucesso!');
}

public function updateTask(Request $request){
         $request->validate([
            'name' => 'required|string|max:50',
        ]);


        DB::table('tasks')
        ->where('id', $request->id)
        ->update([
            'name' =>$request->name,
            'description' =>$request->description,
            'user_id' =>$request->user_id,
        ]);

        return redirect()->route('tasks.all')->with('message', 'tarefa actualizada com sucesso');

    }

}










