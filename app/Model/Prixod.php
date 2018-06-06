<?php

namespace AccountSystem\Model;

use Illuminate\Database\Eloquent\Model;

class Prixod extends Model
{
    // 1 for bank
    // 2 for karz
    // 3 for other
    
    protected $table = 'prixods';
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'id', 'prixod_type', 'name', 'summa', 'data', 'comments'
    ];

    public function selectQuery($sql_stmt) {
        return DB::select($sql_stmt);
    }

    public function sqlStatement($sql_stmt) {
        DB::statement($sql_stmt);
    }

    public function photos() {
        return $this->hasMany('AccountSystem\Model\PrixodPhoto', 'prixod_id', 'id');
    }

    // public function FunctionName($value='')
    // {
    //     # code...
    // }
}
