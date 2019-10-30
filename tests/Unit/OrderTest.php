<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\MotoOrder;
use Illuminate\Support\Facades\DB;
use WithoutMiddleware;

class OrderTest extends TestCase
{
    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::find(3);
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_display_orders()
    {
        $response = $this->actingAs($this->user)->get('/home');
        $response->assertStatus(200);
    }
    public function test_fast_search_display()
    {
        $response = $this->actingAs($this->user)->get('/fastsearch', [
            'modelID' => 1,
            'makeID' => 1,
            'mtid' => 1,
            'ftid' => 1
        ]);
        $this->assertEquals(200, $response->getStatusCode());
    }
    public function test_order_full_info_display()
    {
        $this->withoutMiddleware();
        $response = $this->actingAs($this->user)->post('/motodescription', [
            'idMotoOrder' => 22
        ]);
        $this->assertEquals(200, $response->getStatusCode());
    }
    public function test_post_order()
    {
        $order = new MotoOrder;
        $order->fk_Userid = 3;
        $order->fk_MotoTypeid_MotoType = 1;
        $order->fk_Colorid_Color = 1;
        $order->fk_ContactInfoid_ContactInfo = 1;
        $order->fk_Modelid_Model = 1;
        $order->fk_Defectid_Defect = 1;
        $order->coolingType = 1;
        $order->fuelType = 1;
        $order->engineType = 1;
        $order->tyreLeft = 55;
        $order->engineCapacity = 1;
        $order->enginePower = 1;
        $order->manufactorYear = 1;
        $order->manufactorMonth = 1;
        $order->Price = 1;
        $order->distanceTraveled = 1;
        $order->isNew = false;
        $order->techInspValidTo = 1;
        $order->Euro = 5;
        $order->Description = "this is my test558855";
        $id_contactinfo = DB::table('ContactInfo')->max('id_ContactInfo')+1;
        $order->fk_ContactInfoid_ContactInfo	= $id_contactinfo;
        $order->save();

        $orderID = $order->id_MotoOrder;
        
        // $response = $this->actingAs($user)->post('/motodescription', [
        //     'idMotoOrder' => 22
        // ]);
        $this->assertDatabaseHas('MotoOrder', [
            'Description' => 'this is my test558855'
        ]);
    }
    public function test_order_additions_insert()
    {
        $orderid = DB::table('MotoOrder')->where('Description', '=', 'this is my test558855')->first()->id_MotoOrder;

        DB::table('feature_motoorder')->insert(
            ['fk_Featureid_Feature' => 1, 'fk_MotoOrderid_MotoOrder' => $orderid]
        );
        $this->assertDatabaseHas('feature_motoorder', ['fk_MotoOrderid_MotoOrder' => $orderid]);
    }
    public function test_order_additions_delete()
    {
        $orderid = DB::table('MotoOrder')->where('Description', '=', 'this is my test558855')->first()->id_MotoOrder;

        DB::table('feature_motoorder')->where(
            ['fk_MotoOrderid_MotoOrder' => $orderid]
        )->delete();
        $this->assertDatabaseMissing('feature_motoorder', ['fk_MotoOrderid_MotoOrder' => $orderid]);
    }
    public function test_order_contact_insert()
    {
        $contactid = DB::table('MotoOrder')->where('Description', '=', 'this is my test558855')->first()->fk_ContactInfoid_ContactInfo;

        DB::table('ContactInfo')->insert([
            'phoneNum' => '762480441',
            'Name' => "Lukas",
            'fk_Townsid_Towns' => 1,
            'EMail' => "lukas11234@gmail.com"
        ]);
        $this->assertDatabaseHas('ContactInfo', ['phoneNum' => '762480441']);
    }
    public function test_order_contact_delete()
    {
        $contactid = DB::table('MotoOrder')->where('Description', '=', 'this is my test558855')->first()->fk_ContactInfoid_ContactInfo;

        if ($contactid !== null) {
            DB::table('ContactInfo')->where('phoneNum', '=', '762480441')->delete();                    
        }
        $this->assertDatabaseMissing('ContactInfo', [
            'phoneNum' => '762480441' 
        ]);
    }
    public function test_order_delete()
    {
        $order = MotoOrder::where('Description', '=', 'this is my test558855')->first();
        if ($order !== null) {
            DB::table('MotoOrder')->where('Description', '=', 'this is my test558855')->delete();                    
        }
        $this->assertDatabaseMissing('MotoOrder', [
            'Description' => 'this is my test558855'            
        ]);
    }
}
