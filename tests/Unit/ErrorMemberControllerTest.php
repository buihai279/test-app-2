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

class ErrorMemberControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use DatabaseMigrations;
    use WithoutMiddleware;
    // use DatabaseTransactions;

    // public
    public $nameSmallPhoto='small-image.jpg';
    public $nameBigPhoto='big-image.jpg';
    public $data=[];
    public $pathPhoto='';

    public function __construct()
    {
        $this->pathPhoto=dirname(__FILE__).'\small-image.jpg';
        $this->data=[
            'name' => 'Bui Van Hai',
            'age' => '22',
            'address' => 'Ha Noi',
            'photo' =>  new UploadedFile($this->pathPhoto, $this->nameSmallPhoto, filesize($this->pathPhoto), 'image/png', null, true)
            ];
    }
    public function testEditNameEmpty()
    {
        $member = factory(Member::class)->create();
        $this->data['name' ]='';
        $response = $this->call('POST', 'member/'.$member->id, $this->data);
        $this->assertEquals(302, $response->status());
        $this->assertDatabaseMissing('members', [
                'id'=>$member->id,
                'name' => $this->data['name'],
                'age' => $this->data['age'],
                'address' => $this->data['address'],
                'photo' =>  $this->nameSmallPhoto
            ]);
    }

    public function testAddNameEmpty()
    {
        $member = factory(Member::class)->create($this->data);
        $this->data['name' ]='';
        $response = $this->call('POST', 'addMember', $this->data);
        $this->assertEquals(302, $response->status());
        $this->assertDatabaseMissing('members', [
                'id'=>$member->id,
                'name' => $this->data['name'],
                'age' => $this->data['age'],
                'address' => $this->data['address'],
                'photo' =>  $this->nameSmallPhoto
            ]);
    }


    public function testEditName101Character()
    {
        $member = factory(Member::class)->create();
        $this->data['name' ]=str_repeat('abcdefghjk', 10).'w';
        $response = $this->call('POST', 'member/'.$member->id, $this->data);
        $this->assertEquals(302, $response->status());
        $this->assertDatabaseMissing('members', [
                'id'=>$member->id,
                'name' => $this->data['name'],
                'age' => $this->data['age'],
                'address' => $this->data['address'],
                'photo' =>  $this->nameSmallPhoto
            ]);
    }

    public function testAddName101Character()
    {
        $member = factory(Member::class)->create();
        $this->data['name' ]=str_repeat('abcdefghjk', 10).'w';
        $response = $this->call('POST', 'addMember', $this->data);
        $this->assertEquals(302, $response->status());
        $this->assertDatabaseMissing('members', [
                'id'=>$member->id,
                'name' => $this->data['name'],
                'age' => $this->data['age'],
                'address' => $this->data['address'],
                'photo' =>  $this->nameSmallPhoto
            ]);
    }
    
    public function testEditAddressEmpty()
    {
        $member = factory(Member::class)->create();
        $this->data['address' ]='';
        $response = $this->call('POST', 'member/'.$member->id, $this->data);
        $this->assertEquals(302, $response->status());
        $this->assertDatabaseMissing('members', [
                'id'=>$member->id,
                'name' => $this->data['name'],
                'age' => $this->data['age'],
                'address' => $this->data['address'],
                'photo' =>  $this->nameSmallPhoto
            ]);
    }

    public function testAddAddressEmpty()
    {
        $member = factory(Member::class)->create();
        $this->data['address' ]='';
        $response = $this->call('POST', 'addMember', $this->data);
        $this->assertEquals(302, $response->status());
        $this->assertDatabaseMissing('members', [
                'id'=>$member->id,
                'name' => $this->data['name'],
                'age' => $this->data['age'],
                'address' => $this->data['address'],
                'photo' =>  $this->nameSmallPhoto
            ]);
    }


    public function testEditAddress301Character()
    {
        $member = factory(Member::class)->create();
        $this->data['address' ]=str_repeat('abcdefghjk', 30).'w';
        $response = $this->call('POST', 'member/'.$member->id, $this->data);
        $this->assertEquals(302, $response->status());
        $this->assertDatabaseMissing('members', [
                'id'=>$member->id,
                'name' => $this->data['name'],
                'age' => $this->data['age'],
                'address' => $this->data['address'],
                'photo' =>  $this->nameSmallPhoto
            ]);
    }

    public function testAddAddress301Character()
    {
        $member = factory(Member::class)->create();
        $this->data['address' ]=str_repeat('abcdefghjk', 30).'w';
        $response = $this->call('POST', 'addMember', $this->data);
        $this->assertEquals(302, $response->status());
        $this->assertDatabaseMissing('members', [
                'id'=>$member->id,
                'name' => $this->data['name'],
                'age' => $this->data['age'],
                'address' => $this->data['address'],
                'photo' =>  $this->nameSmallPhoto
            ]);
    }


    public function testEditAgeEmpty()
    {
        $member = factory(Member::class)->create();
        $this->data['age' ]='';
        $response = $this->call('POST', 'member/'.$member->id, $this->data);
        $this->assertEquals(302, $response->status());
        $this->assertDatabaseMissing('members', [
                'id'=>$member->id,
                'name' => $this->data['name'],
                'age' => $this->data['age'],
                'address' => $this->data['address'],
                'photo' =>  $this->nameSmallPhoto
            ]);
    }

    public function testAddAgeEmpty()
    {
        $member = factory(Member::class)->create();
        $this->data['age' ]='';
        $response = $this->call('POST', 'addMember', $this->data);
        $this->assertEquals(302, $response->status());
        $this->assertDatabaseMissing('members', [
                'id'=>$member->id,
                'name' => $this->data['name'],
                'age' => $this->data['age'],
                'address' => $this->data['address'],
                'photo' =>  $this->nameSmallPhoto
            ]);
    }


    public function testEditAge100()
    {
        $member = factory(Member::class)->create();
        $this->data['age' ]=100;
        $response = $this->call('POST', 'member/'.$member->id, $this->data);
        $this->assertEquals(302, $response->status());
        $this->assertDatabaseMissing('members', [
                'id'=>$member->id,
                'name' => $this->data['name'],
                'age' => $this->data['age'],
                'address' => $this->data['address'],
                'photo' =>  $this->nameSmallPhoto
            ]);
    }

    public function testAddAge100()
    {
        $member = factory(Member::class)->create();
        $this->data['age' ]=100;
        $response = $this->call('POST', 'addMember', $this->data);
        $this->assertEquals(302, $response->status());
        $this->assertDatabaseMissing('members', [
                'id'=>$member->id,
                'name' => $this->data['name'],
                'age' => $this->data['age'],
                'address' => $this->data['address'],
                'photo' =>  $this->nameSmallPhoto
            ]);
    }
 

    public function testEditBigPhoto()
    {
        $this->pathPhoto=dirname(__FILE__).'\big-image.jpg';
        $member = factory(Member::class)->create();
        $this->data['photo' ]= new UploadedFile($this->pathPhoto, $this->nameBigPhoto, filesize($this->pathPhoto), 'image/png', null, true);
        $response = $this->call('POST', 'member/'.$member->id, $this->data);
        $this->assertEquals(302, $response->status());
        $this->assertDatabaseMissing('members', [
                'id'=>$member->id,
                'name' => $this->data['name'],
                'age' => $this->data['age'],
                'address' => $this->data['address'],
                'photo' =>  $this->nameBigPhoto
            ]);
    }

    public function testAddBigPhoto()
    {
        $this->pathPhoto=dirname(__FILE__).'\big-image.jpg';
        $member = factory(Member::class)->create();
        $this->data['photo' ]= new UploadedFile($this->pathPhoto, $this->nameBigPhoto, filesize($this->pathPhoto), 'image/png', null, true);
        $response = $this->call('POST', 'addMember', $this->data);
        $this->assertEquals(302, $response->status());
        $this->assertDatabaseMissing('members', [
                'id'=>$member->id,
                'name' => $this->data['name'],
                'age' => $this->data['age'],
                'address' => $this->data['address'],
                'photo' =>  $this->nameBigPhoto
            ]);
    }

    public function testEditExtensionPhoto()
    {
        $this->pathPhoto=dirname(__FILE__).'\photo.bmp';
        $member = factory(Member::class)->create();
        $this->data['photo' ]= new UploadedFile($this->pathPhoto, 'photo.bmp', filesize($this->pathPhoto), 'image/png', null, true);
        $response = $this->call('POST', 'member/'.$member->id, $this->data);
        $this->assertEquals(302, $response->status());
        $this->assertDatabaseMissing('members', [
                'id'=>$member->id,
                'name' => $this->data['name'],
                'age' => $this->data['age'],
                'address' => $this->data['address'],
                'photo' =>  'photo.bmp'
            ]);
    }

    public function testAddExtensionPhoto()
    {
        $this->pathPhoto=dirname(__FILE__).'\photo.bmp';
        $member = factory(Member::class)->create();
        $this->data['photo' ]= new UploadedFile($this->pathPhoto, 'photo.bmp', filesize($this->pathPhoto), 'image/png', null, true);
        $response = $this->call('POST', 'addMember', $this->data);
        $this->assertEquals(302, $response->status());
        $this->assertDatabaseMissing('members', [
                'id'=>$member->id,
                'name' => $this->data['name'],
                'age' => $this->data['age'],
                'address' => $this->data['address'],
                'photo' =>  'photo.bmp'
            ]);
    }
}
