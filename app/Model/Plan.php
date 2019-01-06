<?php

namespace AccountSystem\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //
    protected $fillable = [ 'nalog', 'arenda', 'zarplata', 'komunalni', 'pitanie', 'offisni_rasxod', 'drugie', 'month', 'total' ];

//    public function setMonthAttribute($month) {
//        $this->attributes['month'] = (integer)Carbon::now()->month ;
//    }
}
