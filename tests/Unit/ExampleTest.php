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
        $this->assertTrue(true);

        // $member = factory(App\Member::class)->make();
          $member = factory(Member::class)->create();
        $response = $this->call('GET', 'member/edit/'.$member->id);
        // $response = $this->call('GET', 'member/edit/1');
        $response->assertStatus(200);

		// $dataAdd = [
  //           'name' => 'ppppp',
  //           'age' => '4',
  //           'address' => 'iiiiiiiii'
  //       ];
  //       $response = $this->call('POST', 'addMember', $dataAdd);
  //       $this->assertEquals(404, $response->status());


    }
}
