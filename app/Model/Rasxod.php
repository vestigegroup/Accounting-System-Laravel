<?php

namespace AccountSystem\Model;

use Illuminate\Database\Eloquent\Model;

class Rasxod extends Model
{
    // 1 for zarplata
    // 2 for materials
    // 3 for transport
    // 4 for others
    
    protected $table = 'rasxods';
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'id', 'rasxod_type', 'name', 'summa', 'data', 'comments'
    ];

    public function selectQuery($sql_stmt) {
        return DB::select($sql_stmt);
    }

    public function sqlStatement($sql_stmt) {
        DB::statement($sql_stmt);
    }

    public function photos() {
        return $this->hasMany('AccountSystem\Model\RasxodPhoto', 'rasxod_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo('AccountSystem\Model\Project', 'project_id', 'id');
    }
}
