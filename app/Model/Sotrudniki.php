<?php

namespace AccountSystem\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sotrudniki extends Model
{
    //
    use  SoftDeletes;

    protected $table="sotrudniki";

    protected $fillable = [ 'imja_sotrudnika', 'data_rojdeniya', 'mesto_rojdeniya', 'telefon', 'zarplata', 'doljnost', 'photo_path' ];
}
