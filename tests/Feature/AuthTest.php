<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $response = $this->call('GET', '/login');
        $this->assertEquals(200, $response->status());
    }
    // public function testRegister()
    // {
    //     $response = $this->call('GET', '/login');
    //     $this->assertEquals(200, $response->status());
    // }
    // public function testRedirect()
    // {
    //     $response = $this->call('GET', '/login');
    //     $this->assertEquals(200, $response->status());
    // }
}
