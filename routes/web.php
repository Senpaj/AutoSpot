<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/phpinfo', function() {
    return phpinfo();
});

Route::get('/', function () {
    $makes = App\Make::orderBy("Name")->get();
    $models = App\bikeModel::orderBy("Name")->get();
    $motoTypes = App\MotoType::orderBy("name")->get();
    $fuelTypes = App\FuelTypes::orderBy("name")->get();
    $recentSearches = null;
    if(Auth::check())
    {
        $user_id = auth()->user()->id;
        $recentSearches = App\RecentSearches::where('fk_usersid', '=', $user_id)->orderby('id_RecentSearches', 'desc')->
                                                                                    take(5)->get();
    }

    return view('welcome', compact('makes', 'models', 'motoTypes', 'fuelTypes', 'recentSearches'));
})->name('/');

Auth::routes();

Route::get('/image-view', 'ImageController@index')->name('image-view');
Route::get('/image-submit', 'ImageController@store')->name('image-submit');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/myorders', 'OrderController@DisplayOrders')->name('myorders');
Route::get('/fastsearch', 'OrderController@DisplayFastSearchResult')->name('greitojipaieska');
Route::post('/submitorder', 'OrderController@PostOrder')->name('naujasskelbimas');
Route::post('/motodescription', 'OrderController@DisplayFullInfo')->name('motofulldescription');
Route::get('/neworder', 'OrderController@NewOrder')->name('neworder');
Route::post('/postorder', 'OrderController@PostOrder')->name('postorder');
Route::post('/editorder', 'OrderController@EditOrder')->name('myordersedit');
Route::get('/displayphotos/{id}', function($id = null){
    $order = App\MotoOrder::where('id_MotoOrder', '=', $id)->firstOrFail();
    return view('image-view', compact('order'));
})->name('showphotos');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@adminLogout')->name('admin.logout');
    Route::get('/notapprovedorders', 'AdminController@ShowNotApprovedOrders')->name('admin.shownotapprovedorders');
    Route::get('/showfullinfo/{id}', function($id = null){
        $order = App\MotoOrder::where('id_MotoOrder', '=', $id)->firstOrFail();
        $towns = App\Town::orderby('id_Towns')->get();
        return view('adminshowfullinfo', compact('order', 'towns'));
    })->name('admin.showfullinfo');
    Route::get('/changeorderstatus/{id}/{action}', function($id = null, $action = null){
        $order = App\MotoOrder::where('id_MotoOrder', '=', $id)->firstOrFail();
        if ($action == 1){
            $order->approved = 1;
            $order->save();
        }
        elseif ($action == 0){
            $order->approved = 2;
            $order->save();
        }
        return redirect()->route('admin.shownotapprovedorders');
    })->name('admin.changeorderstatus');
    Route::get('/addadmin', function(){
        return view('addadmin');
    })->name('admin.addadmin');
    Route::post('/insertadmin', 'Auth\AdminRegisterController@')->name('admin.insert');
});
