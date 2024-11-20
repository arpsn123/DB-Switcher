<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\todo_details_mysql;
use App\Models\todo_details_pgsql;
use Illuminate\Http\Request;

class uploadtodo extends Controller
{
    public function submit(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'details' => 'required'
        ]);
        $db = session('database_name');
        // dd($db);
        if($db ==='mysql')
        {
            $todo_details_mysql = new todo_details_mysql();
            $todo_details_mysql->name = $request->input('name');
            $todo_details_mysql->details = $request->input('details');
            $todo_details_mysql->save();
        }
        else if($db === 'pgsql')
        {
            $todo_details_pgsql = new todo_details_pgsql();
            $todo_details_pgsql->name = $request->input('name');
            $todo_details_pgsql->details = $request->input('details');
            $todo_details_pgsql->save();
        }



        return redirect('/getdata');
    }
}
