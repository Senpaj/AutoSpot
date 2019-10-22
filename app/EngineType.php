<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EngineType extends Model
{

    public $primaryKey = 'id_EngineTypes';

    protected $table = 'EngineTypes';

    public $timestamps = false;

    public function motoorder()
    {
        return $this->hasOne('App\MotoOrder', 'engineType');
    }
}
