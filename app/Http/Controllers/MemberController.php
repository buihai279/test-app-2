<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class MemberController extends Controller
{
    public function index()
    {
    	# code...
    }

    public function getList()
    {
    	return Member::get();
    }

    public function update(Request $request, $id)
    {
    	$member= Member::find($id);
    	$member->name=$request->name;
    	$member->address=$request->address;
    	$member->age=$request->age;
    	$member->save();
    	return " Member: $request->name updated!!!";
    }
    public function store(Request $request)
    {
    	// Member::create($request->all());
    	$member=new Member();
    	$member->name=$request->name;
    	$member->address=$request->address;
    	$member->age=$request->age;
    	$member->photo='qqq';
    	$member->save();
    	return response()->json('successfully');
    }
    public function edit($id)
    {
    	return Member::find($id);
    }
}
