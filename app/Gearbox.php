<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GearBox extends Model
{

    public $primaryKey = 'id_GearBoxes';

    protected $table = 'GearBoxes';

    public $timestamps = false;

    /*public function motoorder()
    {
        return $this->hasOne('App\MotoOrder', 'Gearbox');
    }*/
}
