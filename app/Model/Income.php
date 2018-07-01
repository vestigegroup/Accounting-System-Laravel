<?php

namespace AccountSystem\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use AccountSystem\Model\Dolgi;



class Income extends Model
{
    //
    use  SoftDeletes;

    protected $table="incomes";

    // protected $dates = ['created_at'];

    protected $fillable = [ 'id', 'customer_name', 'company_name', 'type_of_zakaz', 'zakaz', 'kolvo', 'stoimost_zakaz', 'sena_zakaz', 'obshiye_summa', 'oplachno', 'ostotok', 'zametka', 'srok'];

    public function dolgiData() {
        return $this->hasMany('AccountSystem\Model\Dolgi', 'income_id', 'id');
    }
}
