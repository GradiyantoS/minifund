<?php

namespace App\Domain\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Cultivation extends Model
{
    //

    public function project(){
        return $this->hasMany('App\Domain\Core\Models\Project');
    }
}
