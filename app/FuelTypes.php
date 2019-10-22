<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelTypes extends Model
{

    public $primaryKey = 'id_FuelTypes';

    protected $table = 'FuelTypes';

    public $timestamps = false;

    public function motoorder()
    {
        return $this->hasOne('App\MotoOrder', 'fuelType');
    }
}
