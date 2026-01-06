<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrendasController extends Controller
{
    public function AllPrendas()
    {

        $prendas = DB::table('prendas')

            ->join('users', 'users.id', 'prendas.user_id')
            ->select('prendas.*', 'users.name as username')
            ->get();

        return view('prendas.allPrendas', compact('prendas'));

        ;
    }
public function viewPrenda($id)
    {
        $prenda = DB::table('prendas')
            ->join('users', 'users.id', 'prendas.user_id')
            ->select('prendas.*', 'users.name as username')
            ->where('prendas.id', $id)
            ->first();

        return view('prendas.viewPrenda', compact('prenda'));
    }


    public function deletePrenda($id)
    {


        Db::table('prendas')
            ->where('id', $id)
            ->delete();

        return back();
    }
}

