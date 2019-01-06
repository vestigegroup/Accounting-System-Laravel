<?php

namespace AccountSystem\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

use AccountSystem\Model\Dolgi;
use AccountSystem\Model\Outgo;

class Income extends Model
{
    //
    use  SoftDeletes;

    protected $table="incomes";

    // protected $dates = ['created_at'];

    protected $fillable = [ 'id', 'customer_name', 'company_name', 'type_of_zakaz', 'zakaz', 'kolvo', 'stoimost_zakaz', 'sena_zakaz', 'obshiye_summa', 'oplachno', 'ostotok', 'zametka', 'srok', 'month'];

    public function dolgiData() {
        return $this->hasMany('AccountSystem\Model\Dolgi', 'income_id', 'id');
    }

    public function getCreatedAtAttribute($value){
    	return Carbon::parse($value)->format('d-m-Y');
    }

    public function outgos() {
        return $this->hasMany('AccountSystem\Model\Outgo', 'tip_id', 'id')->where('tip_type_id', 1);
    }

    public function getObshiye(){
        return $this->outgos()->selectraw('tip_id, SUM(obwiya) as total')->groupBy('tip_id');
    }
}
