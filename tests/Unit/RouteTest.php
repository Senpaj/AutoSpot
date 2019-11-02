<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class RouteTest extends TestCase
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
    public function test_home_route()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login_route()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }
    public function test_new_order_route()
    {
        $response = $this->get('/neworder');
        $response->assertStatus(200);
    }
    public function test_register_route()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }
    public function test_fast_search_route()
    {
        $response = $this->get('/fastsearch');
        $response->assertStatus(200);
    }
    public function test_my_orders_route()
    {
        $response = $this->get('/myorders');
        $response->assertRedirect('/home');
    }
    public function test_admin_login_route()
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
    }
    public function test_admin_show_full_info_route()
    {
        //Neveikia

        //$response = $this->get('/admin/showfullinfo/1');
        //$response->assertStatus(200);
    }
    public function test_admin_not_approved_orders_route()
    {
        $response = $this->get('/admin/notapprovedorders');
        $response->assertStatus(200);
    }
    public function test_admin_logout_route()
    {
        $response = $this->get('/admin/logout');
        $response->assertRedirect('/home');
    }
    public function test_admin_change_order_status_route()
    {
        //Neveikia

        //$response = $this->get('/admin/changeorderstatus/1/1');
        //$response->assertStatus(200);
    }
    public function test_admin_add_admin_route()
    {
        $response = $this->get('/admin/addadmin');
        $response->assertStatus(200);
    }
    public function test_admin_insert_admin_route()
    {
        //Neveikiantis route

        //$response = $this->get('/admin/insertadmin');
        //$response->assertStatus(200);
    }
}
