<?php

namespace App\Http\Controllers;

use Config;
use Illuminate\Http\Request;

class set_database extends Controller
{
    public function set($db)
    {
        // dd($db);
        if (!in_array($db, ['mysql', 'pgsql'])) {
            abort(400, 'Invalid database option');
        }


        Config::set('database.default', $db);

        session(['database_name' => $db]);

        // return redirect(view('first'), ['database_name' => $db]);


        return redirect()->route('todo.welcome', ['db' => $db]);
    }

    public function welcome($db)
    {
        return view("first", ['db' => $db]);
    }
}
