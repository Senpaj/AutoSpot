<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bikeModel extends Model
{

    public $primaryKey = 'id_Model';

    protected $table = 'Model';

    public $timestamps = false;

    public function motoorder(){
        return $this->hasMany('App\MotoOrder', 'fk_Modelid_Model');
    }
    public function make(){
        return $this->belongsTo('App\Make', 'fk_Makeid_Make');
    }
}
