<?php

namespace AccountSystem\Model;

use Illuminate\Database\Eloquent\Model;

class PrixodPhoto extends Model
{
    //
    protected $table = 'prixod_photos';

    public function selectQuery($sql_stmt) {
        return DB::select($sql_stmt);
    }

    public function sqlStatement($sql_stmt) {
        DB::statement($sql_stmt);
    }
}
