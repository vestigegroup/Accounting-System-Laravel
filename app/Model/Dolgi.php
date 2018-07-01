<?php

namespace AccountSystem\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Dolgi extends Model
{
    //
    use  SoftDeletes;

    protected $table="dolgi";

    protected $fillable = [ 'id', 'income_id', 'naimenovanie_klienty', 'data_dolgi', 'summa'];


}
