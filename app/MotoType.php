<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotoType extends Model
{

    public $primaryKey = 'id_MotoType';

    protected $table = 'MotoType';

    public $timestamps = false;

    public function motoorders(){
        return $this->hasMany('App\MotoOrder', 'fk_MotoTypeid_MotoType');
    }
}
