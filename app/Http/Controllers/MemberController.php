<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class MemberController extends Controller
{
    public function index()
    {
        // dd(UploadedFile::fake()->image('avatar.jpg')) ;
    	return view('members.index');
    }

    public function getList()
    {
    	return Member::orderBy('updated_at','DESC')->get();
    }

    public function update(Request $request, $id)
    {
        $fileName ='';
        if($request->file('photo')):
            $fileName = date('Y-m-d', time()).'-'.$request->file('photo')->getClientOriginalName();
            Storage::put('photo/'.$fileName, file_get_contents($request->file('photo')));
        endif;
    	$member= Member::find($id);
    	$member->name=$request->name;
    	$member->address=$request->address;
        $member->age=$request->age;
        $member->photo=$fileName;
    	$member->save();
    	return " Member: $request->name updated!!!";
    }
    public function store(Request $request)
    {
        // dd($request->file('photo')->getClientOriginalName());
        $fileName ='';
        if($request->file('photo')):
            $fileName = date('Y-m-d', time()).'-'.$request->file('photo')->getClientOriginalName();
            Storage::put('photo/'.$fileName, file_get_contents($request->file('photo')));
        endif;
    	$member=new Member();
    	$member->name=$request->name;
    	$member->address=$request->address;
    	$member->age=$request->age;
    	$member->photo=$fileName;
    	$member->save();
    	return response()->json('successfully');
    }
    public function edit($id)
    {
    	return Member::find($id);
    }
    public function delete($id)
    {
        // return Member::find($id);
        DB::table('members')->where('id', '=', $id)->delete();
        return response()->json('delete successfully');
    }

    public function upload(Request $request)
    {
        dd($request);
    }
}
