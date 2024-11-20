<?php

namespace App\Http\Controllers;
use App\Models\todo_details_mysql;
use App\Models\todo_details_pgsql;
use Illuminate\Http\Request;

class deletecontroller extends Controller
{
    public function destroy($id)
    {

        $db = session('database_name');
        if($db ==='mysql')
        {
            todo_details_mysql::findOrFail($id)->delete();
        }
        else if($db === 'pgsql')
        {
            todo_details_pgsql::findOrFail($id)->delete();
        }



        return redirect('/getdata');
    }
}

