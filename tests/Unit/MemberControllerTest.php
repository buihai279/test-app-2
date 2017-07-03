<?php

namespace Tests\Unit;

use App\Member;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
class MemberControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use DatabaseMigrations;
    use WithoutMiddleware;
    // use DatabaseTransactions;

    public function testEditMember()
    {
        $member = factory(Member::class)->create();
        $response = $this->call('GET', 'member/edit/'.$member->id);
        $response->assertStatus(200);
    }
    public function testAddMember()
    {
        $array=[
            'name' => 'hiha',
            'age' => '22',
            'address' => 'HN',
            'photo' => UploadedFile::fake()->image('avatar.jpg'),
            ];

        // print_r($member);
        $response = $this->call('POST', 'addMember',$array);
        $this->assertEquals(200, $response->status());
    }
    public function testDeleteMember()
    {
        $member = factory(Member::class)->create();
        $response = $this->call('POST', 'member/delete/'.$member->id);
        $response->assertStatus(200);
    }
    public function testUpdateMember()
    {
        $array=[
            'name' => 'hiha',
            'age' => '22',
            'address' => 'HN',
            'photo' => UploadedFile::fake()->image('avatar.jpg'),
            ];
        $member = factory(Member::class)->create();
        $response = $this->call('POST', 'member/'.$member->id,$array);
        $this->assertEquals(200, $response->status());
    }
    public function testIndexMember()
    {
        $response = $this->call('GET', 'members/');
        $this->assertEquals(200, $response->status());
    }
}
