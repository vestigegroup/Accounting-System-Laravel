<?php

namespace AccountSystem\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Carbon\Carbon;
// \Carbon\Carbon::setToStringFormat('d-m-Y');



class Income extends Model
{
    //
    use  SoftDeletes;

    protected $table="incomes";

    // protected $dates = ['created_at'];

    protected $fillable = [ 'customer_name', 'company_name', 'type_of_zakaz', 'zakaz', 'kolvo', 'stoimost_zakaz', 'sena_zakaz', 'obshiye_summa', 'oplachno', 'ostotok', 'zametka', 'srok'];

    
    // public function selectQuery($sql_stmt) {
    //     return DB::select($sql_stmt);
    // }

    // public function sqlStatement($sql_stmt) {
    //     DB::statement($sql_stmt);
    // }


    // public function product() {
    //     return $this->hasMany('App\Model\Product', 'categories_id', 'id');
    // }
}
