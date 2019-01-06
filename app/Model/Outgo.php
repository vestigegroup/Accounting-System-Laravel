<?php

namespace AccountSystem\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

use AccountSystem\Model\Income;
use AccountSystem\Model\Sotrudniki;
use AccountSystem\Model\Partner;

class Outgo extends Model
{
    //
    use  SoftDeletes;

    protected $table="outgos";

    // protected $dates = ['created_at'];

    protected $fillable = [ 'ispolnitelni', 'summa', 'data', 'naimenovanie', 'ed_izm', 'kol_vo', 'sena', 'obwiya', 'tip_rasxod', 'month','tip_id', 'tip_type_id', 'tip_name'];


    public function getCreatedAtAttribute($value){
    	return Carbon::parse($value)->format('d-m-Y');
    }

    // public function incomes(){
    //     return $this->hasOne('AccountSystem\Model\Income', 'id', 'tip_rasxod');
    // }

    // public function incomesname(){
    //     return $this->incomes()->selectraw('id, customer_name, company_name');
    // }

    // public function sotrudniki(){
    //     return $this->hasOne('AccountSystem\Model\Sotrudniki', 'id', 'tip_rasxod');
    // }

    // public function sotrudnikiname(){
    //     return $this->sotrudniki()->selectraw('id, imja_sotrudnika');
    // }

    // public function partner(){
    //     return $this->hasOne('AccountSystem\Model\Partner', 'id', 'tip_rasxod');
    // }

    // public function partnername(){
    //     return $this->partner()->selectraw('id, nazivaniye_firma');
    // }
}
