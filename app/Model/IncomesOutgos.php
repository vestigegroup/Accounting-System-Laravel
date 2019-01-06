<?php

namespace AccountSystem\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class IncomesOutgos extends Model
{
    protected $fillable = [
        'daily', 'incomes_sum_daily', 'outgos_sum_daily'
    ];

    public function getDailyAttribute($value){
    	return Carbon::parse($value)->format('d-m-Y');
    }
}
