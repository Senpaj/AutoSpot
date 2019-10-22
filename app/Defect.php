<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Defect extends Model
{

    public $primaryKey = 'id_Defect';

    protected $table = 'Defect';

    public $timestamps = false;

    public function motoorders(){
        return $this->hasMany('App\MotoOrder', 'fk_Defectid_Defect');
    }
}
