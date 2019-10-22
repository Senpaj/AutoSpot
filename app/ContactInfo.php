<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{

    public $primaryKey = 'id_ContactInfo';

    protected $table = 'ContactInfo';

    public $timestamps = false;

    public function motoorders(){
        return $this->hasMany('App\MotoOrder', 'fk_ContactInfoid_ContactInfo');
    }
}
