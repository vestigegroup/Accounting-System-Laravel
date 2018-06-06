<?php

namespace AccountSystem\Model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $table = 'projects';

    public function rasxod() {
        return $this->hasMany('AccountSystem\Model\Rasxod', 'project_id', 'id');
    }
}
