<?php

namespace App\Http\Controllers;
use App\Models\todo_details_mysql;
use App\Models\todo_details_pgsql;
use Illuminate\Http\Request;

class markasdone extends Controller
{
    public function update($id)
    {

        $db = session('datadatabase_name');
        if($db === 'pgsql')
        {
            $todo = todo_details_mysql::findOrFail($id);
            $todo->isdone = true;
            $todo->save();
        }
        else if($db === 'mysql')
        {
            $todo = todo_details_pgsql::findOrFail($id);
            $todo->isdone = true;
            $todo->save();
        }

        return redirect('/getdata');
    }
}
