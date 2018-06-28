<?php

namespace AccountSystem\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Outgo extends Model
{
    //
    use  SoftDeletes;

    protected $table="outgos";

    // protected $dates = ['created_at'];

    protected $fillable = [ 'ispolnitelni', 'summa', 'data', 'naimenovanie', 'ed_izm', 'kol_vo', 'sena', 'obwiya', 'tip_rasxod'];
}
