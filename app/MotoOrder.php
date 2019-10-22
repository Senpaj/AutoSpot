<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotoOrder extends Model
{

    public $primaryKey = 'id_MotoOrder';

    protected $table = 'MotoOrder';

    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\User', 'fk_Userid');
    }
    public function model(){
        return $this->belongsTo('App\bikeModel', 'fk_Modelid_Model');
    }
    public function mototype(){
        return $this->belongsTo('App\MotoType', 'fk_MotoTypeid_MotoType');
    }
    public function color()
    {
        return $this->belongsTo('App\Color', 'fk_Colorid_Color')->withDefault();;
    }
    public function contactinfo()
    {
        return $this->belongsTo('App\ContactInfo', 'fk_ContactInfoid_ContactInfo');
    }
    public function defect()
    {
        return $this->belongsTo('App\Defect', 'fk_Defectid_Defect');
    }
    public function fueltype()
    {
        return $this->belongsTo('App\FuelTypes', 'fuelType');
    }
    public function enginetype()
    {
        return $this->belongsTo('App\EngineType', 'engineType');
    }
    public function gearbox()
    {
        return $this->belongsTo('App\Gearbox', 'Gearbox');
    }    
    public function coolingtype()
    {
        return $this->belongsTo('App\CoolingType', 'coolingType');
    }
    public function features()
    {
        return $this->belongsToMany('App\Feature', 'feature_motoorder', 'fk_MotoOrderid_MotoOrder', 'fk_Featureid_Feature');
    }
    public function files()
    {
        return $this->hasMany('App\OrderFiles', 'fk_MotoOrderid_MotoOrder');
    } 
}
