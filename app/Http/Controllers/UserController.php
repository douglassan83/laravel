<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function addUser()
    {
        $pageAdmin = 'António';
        return view('users.add_user', compact('pageAdmin'));
    }

    public function allUsers()
    {

        // simular consulta de base de dados

        $cesaeEmail = 'cesaedigital@cesae.pt';

        $cesaeInfo =
            [
                'name' => 'cesae',
                'email' => 'cesae@gmail.com',
                'address' => ' rua do cesae'
            ];

        //$students = ['Rafael', 'Leandro','Rita', 'Mafalda'];

        $students = [
            ['name' => 'Rafael', 'email' => 'Rafael@gmail.com'],
            ['name' => 'Mafalda', 'email' => 'Mafalda@gmail.com'],
            ['name' => 'Luís', 'email' => 'Luís@gmail.com'],
            ['name' => 'Leandro', 'email' => 'Leandro@gmail.com'],
        ];

        //dd($cesaeInfo['name]);
        $users = DB::table('users')->get();



        //dd($students); comando para visualizar como os dados vem da base de dados antes de utilizar

        return view('users.all_users', compact('cesaeEmail', 'students', 'cesaeInfo', 'users'));
    }

    public function insertUserIntoDB()
    {
        //validar se dados estão em conformidades com a estrutura da base de dados
        //se passar em todas as validações, insere então na base de dados
        DB::table('users')
            ->updateOrInsert(
                [
                    'email' => 'Rafaela3@gmail.com',
                ],
                [
                    'name' => 'Rafaela',
                    'password' => 'RAfaela1234',
                    'updated_at' => now(),
                    'nif' => '2555555555'
                ]
            );
        return response()->json('user inserido com sucesso');
    }
    //função raw que insere um user na Base de dados (teste do dbquery builder sem frontend)
    public function UpdateIntoDB()
    {

        DB::table('users')
            ->where('id', 1)
            ->update([
                'email' => 'douglas2025@gmail.com',
                'address' => 'rua do react, 2025'
            ]);
        return response()->json('update realizado com sucesso');
    }

    public function deleteUserFromDB()
    {

        //query para apagar
        DB::table('users')
            ->where('id', 5)
            ->delete();

        return response()->json('user apagado com sucesso');
    }

    public function selectUsersFromDB()
    {
        $users = DB::table('users')
            ->whereNotNull('updated_at')
            ->get();
        dd($users);
    }

    //função que vai carregar a ficha do user

    public function viewUser($id)
    {

        //query que vai buscar o user que estou a clicar
        $user = DB::table('users')

            ->where('id', $id)

            ->first();
        //dd($user);
        // $user = User::where('id', $id)
        //         ->first();

        return view('users.view_user', compact('user'));



    }


    public function deleteUser($id)
    {

        //definição de comportamento dos dados da tabela tasks
        // quando houver um delele do user associado a uma task.
        //  caso contrário, não permite a exclusão.
        Db::table('tasks')
            ->where('user_id', $id)
            ->delete();


        Db::table('users')
            ->where('id', $id)
            ->delete();

        return back();
    }



}
