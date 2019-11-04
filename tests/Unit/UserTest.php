<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_register()
    {
        $this->withoutMiddleware();
        $faker = factory(User::class)->create()->toArray();
        $response = $this->post('/register', $faker); //raso Sorry, your session has expired. Please refresh and try again.    

        array_splice($faker, 4, 2);
        $this->assertDatabaseHas('users', $faker);
    }

    public function test_login()
    {
        $user = User::find(3);
        $userArray = [
            'email' => $user->email,
            'password' => 'secret',
        ];

        $response = $this->post('login', $userArray);  //raso Sorry, your session has expired. Please refresh and try again.    
    }
}
