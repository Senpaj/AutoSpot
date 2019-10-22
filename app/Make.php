<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{

    public $primaryKey = 'id_Make';

    protected $table = 'Make';

    public $timestamps = false;

    public function models(){
        return $this->hasMany('App\bikeModel', 'fk_Makeid_Make');
    }
}
