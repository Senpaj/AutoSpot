<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoolingType extends Model
{

    public $primaryKey = 'id_CoolingTypes';

    protected $table = 'CoolingTypes';

    public $timestamps = false;

    public function motoorder()
    {
        return $this->hasOne('App\MotoOrder', 'coolingType');
    }
}
