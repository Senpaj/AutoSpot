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
        $response->assertSeeText("Prisijungimas");

        $response = $this->actingAs($this->user)->get('/login')->assertRedirect('/home');
        if ($response->assertRedirect()) {
            $response = $this->get($response->headers->get('Location'));
            $response->assertSeeText("You are logged in");
        }
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
        $response->assertSeeText("Registracija");

        $response = $this->actingAs($this->user)->get('/register')->assertRedirect('/home');
        if ($response->assertRedirect()) {
            $response = $this->get($response->headers->get('Location'));
            $response->assertSeeText("You are logged in");
        }
    }
}
