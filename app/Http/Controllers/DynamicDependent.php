<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Make;
use App\Model;
use App\bikeModel;
use App\MotoType;
use App\FuelTypes;
use App\RecentSearches;
use Illuminate\Support\Facades\Auth;

class DynamicDependent extends Controller
{
    function index()
    {
        $make_list = Make::orderBy("Name")->get();
        $makes = Make::orderBy("Name")->get();
        $models = bikeModel::orderBy("Name")->get();
        $motoTypes = MotoType::orderBy("name")->get();
        $fuelTypes = FuelTypes::orderBy("name")->get();
        $recentSearches = null;
        if(Auth::check())
        {
            $user_id = auth()->user()->id;
            $recentSearches = RecentSearches::where('fk_usersid', '=', $user_id)->orderby('id_RecentSearches', 'desc')->                                                                                take(5)->get();
        }
        
        return view('welcome', compact('makes', 'models', 'motoTypes', 'fuelTypes', 'recentSearches', 'make_list'));
        
        //$models = App\bikeModel::orderBy("Name")->get();
    }
}
