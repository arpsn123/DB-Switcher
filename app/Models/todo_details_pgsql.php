<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class todo_details_pgsql extends Model
{
    //
    protected $connection = 'pgsql';
    protected $table = 'todo_details_pgsql';
}
