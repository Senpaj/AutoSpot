<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\MotoOrder;
use App\RecentSearches;
use App\Make;
use App\Color;
use App\Defect;
use App\Feature;
use App\EngineType;
use App\Town;
use App\bikeModel;
use App\MotoType;
use App\CoolingType;
use App\OrderFiles;
use App\FuelTypes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class OrderController extends Controller
{
    public function DisplayOrders()
    {
        if(Auth::check()){
            $user_id = auth()->user()->id;
            $user = User::find($user_id);

            $orders = $user->motoorders;
		//dd($orders[0]);
//                            {{$order->model->make->Name}} {{$order->model->Name}}<br>
            return view('myorders', compact('orders'));
        }
        return redirect('home');
    }
    public function EditOrder(Request $request)
    {
        if(Auth::check()){
            $id = $request->get('idMotoOrder');
            $order = MotoOrder::find($id);
            $makes = Make::orderBy("Name")->get();
            $models = bikeModel::orderBy("Name")->get();
            $motoTypes = MotoType::orderBy("name")->get();
            $fuelTypes = FuelTypes::orderBy("name")->get();
            $defects = Defect::orderby("id_Defect")->get();
            $colors = Color::orderby("Name")->get();
            $coolingTypes = CoolingType::orderby("Name")->get();
            $engineTypes = EngineType::orderby("Name")->get();
            $features = Feature::orderby("id_Feature")->get();
            $towns = Town::orderby("id_Towns")->get();
            //$id = $order->fk_Makeid_Make
            $contact = DB::table('ContactInfo')->where('id_ContactInfo', $order->fk_ContactInfoid_ContactInfo)->first();
            $additions = DB::table('feature_motoorder')->where('fk_MotoOrderid_MotoOrder', $id)->get();
            $addition = null;
            $i = 0;
            foreach ($additions as $add){
                $addition[$i++] = $add->fk_Featureid_Feature;
            }
            $makeId = Make::where('id_Make', bikeModel::where('id_Model', $order->fk_Modelid_Model)->first()->fk_Makeid_Make)->first()->id_Make;
            return view('myordersedit', compact('order', 'contact', 'addition', 'makeId', 'makes', 'models', 'motoTypes',
                                         'fuelTypes', 'defects', 'colors', 'coolingTypes', 'engineTypes', 'features', 'towns'));
        }
        return redirect('myorders');
    }
    public function DisplayFastSearchResult(Request $request)
    {
        if(Auth::check()){
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            if(isset($user_id) && isset($request->save)){
                $recentSearch = new RecentSearches;
                $recentSearch->fk_usersid = $user_id;
                $recentSearch->makeID = $request->makeID;
                $recentSearch->modelID = $request->modelID;
                $recentSearch->pf = $request->pf;
                $recentSearch->pt = $request->pt;
                $recentSearch->yf = $request->yf;
                $recentSearch->yt = $request->yt;
                $recentSearch->ftid = $request->ftid;
                $recentSearch->mtid = $request->mtid;
                if($request->save != "!") $recentSearch->save();
            }
        }

        $orders = MotoOrder::wherehas(
            'mototype', function($query) use ($request){
                    if((int)$request->mtid != 0) $query->where('id_MotoType', '=', (int)$request->mtid);
                }
        )->wherehas(
            'model', function($query) use ($request){
                if((int)$request->modelID != 0) $query->where('id_Model', '=', (int)$request->modelID);
            }
        )->wherehas(
            'model.make', function($query) use ($request){
                if((int)$request->makeID != 0) $query->where('id_Make', '=', (int)$request->makeID);
            }
        )->wherehas(
            'fueltype', function($query) use ($request){
                if((int)$request->ftid != 0) $query->where('id_FuelTypes', '=', (int)$request->ftid);
            }
        )->when((int)$request->yf != 0, function($q) use ($request){
            return $q->where('manufactorYear', '>=', (int)$request->yf);
        })->when((int)$request->yt != 0, function($q) use ($request){
            return $q->where('manufactorYear', '<=', (int)$request->yt);
        })->when((int)$request->pf != 0, function($q) use ($request){
            return $q->where('Price', '>=', (int)$request->pf);
        })->when((int)$request->pt != 0, function($q) use ($request){
            return $q->where('Price', '<=', (int)$request->pt);
        })->where('approved', '=', 1)->orderBy('Price', 'asc')->paginate(15);
        return view('fastsearchdisplay', compact('orders'));
        //Geras DB query tik pakeiciau su ELOQUENT
        // $orders = DB::table('MotoOrder')
        // ->join('Model', 'MotoOrder.fk_Modelid_Model', '=', 'Model.id_Model')
        // ->join('Make', 'Make.id_Make', '=', 'Model.fk_Makeid_Make')
        // ->join('Color', 'Color.id_Color', '=', 'MotoOrder.fk_Colorid_Color')
        // ->join('MotoType', 'MotoType.id_MotoType', '=', 'MotoOrder.fk_MotoTypeid_MotoType')
        // ->join('FuelTypes', 'FuelTypes.id_FuelTypes', '=', 'MotoOrder.fuelType')
        // ->join('GearBoxes', 'GearBoxes.id_GearBoxes', '=', 'MotoOrder.gearbox')
        // ->join('EngineTypes', 'EngineTypes.id_EngineTypes', '=', 'MotoOrder.engineType')
        // ->join('CoolingTypes', 'CoolingTypes.id_CoolingTypes', '=', 'MotoOrder.coolingType')

        // ->select(
        //     'Make.Name as makeName', 'Model.Name as modelName', 'Color.name as colorName',
        //     'MotoOrder.engineCapacity', 'MotoOrder.enginePower', 'MotoOrder.manufactorYear',
        //     'MotoOrder.manufactorMonth', 'MotoOrder.Price', 'MotoOrder.distanceTraveled',
        //     'MotoOrder.Weight', 'MotoOrder.Description', 'MotoType.name as MTname', 'FuelTypes.name as FTname',
        //     'GearBoxes.name as GBname', 'EngineTypes.name as ETname', 'CoolingTypes.name as CTname'
        // );
        // if($model != 0) $orders->where('Model.id_Model', '=', $model);
        // if($make != 0) $orders->where('Make.id_Make', '=', $make);
        // if($yearFrom != 0) $orders->where('MotoOrder.manufactorYear', '>=', $yearFrom);
        // if($yearTo != 0) $orders->where('MotoOrder.manufactorYear', '<=', $yearTo);
        // if($priceFrom != 0) $orders->where('MotoOrder.manufactorYear', '>=', $priceFrom);
        // if($priceTo != 0) $orders->where('MotoOrder.manufactorYear', '<=', $priceTo);
        // if($fuel != 0) $orders->where('MotoOrder.fuelType', '=', $fuel);
        // if($motoType != 0) $orders->where('MotoOrder.fk_MotoTypeid_MotoType', '=', $motoType);
        // $orders = $orders->paginate(15);
    }
    public function DisplayFullInfo(Request $request)
    {
        DB::enableQueryLog();
        $order = MotoOrder::where('id_MotoOrder', '=', $request->idMotoOrder)->firstOrFail();
        $towns = Town::orderby('id_Towns')->get();
        return view('motoFullDescription', compact('order', 'towns'));
    }
    public function NewOrder(Request $request)
    {
        $makes = Make::orderBy("Name")->get();
        $models = bikeModel::orderBy("Name")->get();
        $motoTypes = MotoType::orderBy("name")->get();
        $fuelTypes = FuelTypes::orderBy("name")->get();
        $defects = Defect::orderby("id_Defect")->get();
        $colors = Color::orderby("Name")->get();
        $coolingTypes = CoolingType::orderby("Name")->get();
        $engineTypes = EngineType::orderby("Name")->get();
        $features = Feature::orderby("id_Feature")->get();
        $towns = Town::orderby("id_Towns")->get();
        return view('newOrder', compact('makes', 'models', 'motoTypes',
                                         'fuelTypes', 'defects', 'colors', 'coolingTypes', 'engineTypes', 'features', 'towns'));
    }
    public function PostOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'files' => 'required',
            'makeID' => 'required',
            'modelID' => 'required',
            'motoTypeId' => 'required',
            'yearForNewOrder' => 'required',
            'price' => 'required',
            'engineCapacity' => 'required',
            'defect' => 'required',
            'color' => 'required',
            'contactname' => 'required',
            'contactphone' => 'required',
            'contacttown' => 'required',
            'files.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
       }
       $user_id = auth()->user()->id;
       $user = User::find($user_id);
       $order = new MotoOrder;
       $order->fk_Userid = $user_id;
       $order->fk_MotoTypeid_MotoType = $request->motoTypeId;
       $order->fk_Colorid_Color = ($request->color == null ? 1 : $request->color);
       $order->fk_ContactInfoid_ContactInfo = 1;
       $order->fk_Modelid_Model = $request->modelID;
       $order->fk_Defectid_Defect = ($request->defect == null ? 1 : $request->defect);
       $order->coolingType = ($request->coolingType == null ? 4 : $request->coolingType);
       $order->fuelType = ($request->fuelType == null ? 1 : $request->fuelType);
       $order->engineType = ($request->engineType == null ? 3 : $request->engineType);
       $order->tyreLeft = ($request->tyreLeft == null ? 0 : $request->tyreLeft);
       $order->engineCapacity = $request->engineCapacity;
       $order->enginePower = $request->enginePower;
       $order->manufactorYear = $request->yearForNewOrder;
       $order->manufactorMonth = $request->monthForNewOrder;
       $order->Price = $request->price;
       $order->distanceTraveled = $request->distanceTraveled;
       $order->isNew = false;
       $order->techInspValidTo = $request->yearFoyearForTArNewOrder;
       $order->Euro = 5;
       $order->Description = $request->comment;
       $id_contactinfo = DB::table('ContactInfo')->max('id_ContactInfo')+1;
       $order->fk_ContactInfoid_ContactInfo	= $id_contactinfo;
       $order->save();
       $orderID = $order->id_MotoOrder;
       if(!empty($request->additions))
        foreach ($request->additions as $addition){
                DB::table('feature_motoorder')->insert(
                    ['fk_Featureid_Feature' => $addition, 'fk_MotoOrderid_MotoOrder' => $orderID]
                );
        }
        DB::table('ContactInfo')->insert([
            'phoneNum' => $request->contactphone,
            'Name' => $request->contactname,
            'fk_Townsid_Towns' => (int)$request->contacttown,
            'EMail' => $user->email
        ]);
       $images = $request->file();
       foreach ($images['files'] as $image){
           $filename = null;
           $location = null;
           $upimage = null;
           sleep(1);
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $upimage = new OrderFiles;
            $upimage->path = $filename;
            $upimage->fk_MotoOrderid_MotoOrder = $orderID;


            $upimage->save();
       }
        return redirect('neworder')->with('status', 'Skelbimas pateiktas peržiūrai!');
    }
}
