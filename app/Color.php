<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{

    public $primaryKey = 'id_Color';

    protected $table = 'Color';

    public $timestamps = false;

    public function motoorders(){
        return $this->hasMany('App\MotoOrder', 'fk_Colorid_Color');
    }
}
