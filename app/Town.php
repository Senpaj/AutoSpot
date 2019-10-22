<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{

    public $primaryKey = 'id_Towns';

    protected $table = 'towns';

    public $timestamps = false;

}
