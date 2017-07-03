<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Member;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use DatabaseMigrations;
    use WithoutMiddleware;
    use DatabaseTransactions;
    public function testBasicTest()
    {
    }
}
