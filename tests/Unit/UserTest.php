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
    public function test_insert_user()
    {
        $faker = factory(User::class)->create()->toArray();
        $response = $this->post('/register', $faker); //raso  //pisa Sorry, your session has expired. Please refresh and try again.    

        array_splice($faker, 4, 2);
        $this->assertDatabaseHas('users', $faker);
    }

    public function test_login()
    {
        $user = User::find(19);
        $userArray = [
            'email' => $user->email,
            'password' => 'secret',
        ];

        $response = $this->post('login', $userArray);  //raso Sorry, your session has expired. Please refresh and try again.    
        echo strip_tags($response->getContent());
    }
}
