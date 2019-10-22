<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderFiles extends Model
{

    public $primaryKey = 'id_orderFiles';

    protected $table = 'orderfiles';

    public $timestamps = false;

    public function motoorders(){
        return $this->belongsTo('App\MotoOrder');
    }
}
