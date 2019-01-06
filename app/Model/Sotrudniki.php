<?php

namespace AccountSystem\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use AccountSystem\Model\Outgo;


class Sotrudniki extends Model
{
    //
    use  SoftDeletes;

    protected $table="sotrudniki";

    protected $fillable = [ 'imja_sotrudnika', 'data_rojdeniya', 'mesto_rojdeniya', 'telefon', 'zarplata', 'doljnost', 'photo_path' ];

    public function outgos() {
        return $this->hasMany('AccountSystem\Model\Outgo', 'tip_id', 'id')->where('tip_type_id', 2);
    }

    public function getSumma(){
        return $this->outgos()->selectraw('tip_id, SUM(obwiya) as total')->groupBy('tip_id');
    }
}
