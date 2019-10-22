<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{

    public $primaryKey = 'id_Feature';

    protected $table = 'feature';

    public $timestamps = false;

    public function motoorders()
    {
        return $this->belongsToMany('App\MotoOrder', 'feature_motoorder', 'fk_Featureid_Feature', 'fk_MotoOrderid_MotoOrder');
    }
}
