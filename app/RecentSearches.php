<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecentSearches extends Model
{

    public $primaryKey = 'id_RecentSearches';

    protected $table = 'RecentSearches';

    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\User', 'id_RecentSearches');
    }
}
