<?php

namespace App\Domain\Core\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //

    protected $table='projects';
    public $incrementing = false;

    public function getProjectNoAttribute($value){

        $id =  sprintf('%03d',$this->cultivation_id);
        $start_day = Carbon::parse($this->Attributes['start_at'])->format('d');
        $start_month = Carbon::parse($this->Attributes['start_at'])->format('m');
        $start_year = Carbon::parse($this->Attributes['start_at'])->format('y');
        $prono =  sprintf('%03d',$value);
        $proformat = "P".$id.$start_day.$start_month.$start_year.$prono;

        return ($proformat);
    }

    public function cultivation(){
        return $this->belongsTo('App\Domain\Core\Models\Cultivation','cultivation_id','id');
    }
}
