<?php

use App\User;

class UserTest extends TestCase {

    /**
     * @return void
     */
    public function testCanViewUsersIndexPage()
    {
        $response = $this->call('GET', '/users');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testCanViewCreateUserPage()
    {
        $response = $this->call('GET', '/users/create');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testCanViewUserShowPage()
    {
        $user = User::all()->first();
        $id = $user->id;
        $response = $this->call('GET', "/users/{$id}");

        $this->assertEquals(200, $response->getStatusCode());
    }

}
