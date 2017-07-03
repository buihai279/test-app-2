<?php

namespace App\Http\Controllers;

use App\Member;
use App\Http\Requests\UpdateMember;
use App\Http\Requests\StoreMember;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function index()
    {
        return view('members.index');
    }

    public function getList()
    {
        return Member::orderBy('updated_at', 'DESC')->get();
    }

    public function update(UpdateMember $request, $id)
    {
        $fileName ='';
        if ($request->file('photo')):
             $this->validate($request, [
                'photo' => 'mimes:jpeg,jpg,png,gif|max:10240',
            ]);
        $fileName = date('Y-m-d', time()).'-'.$request->file('photo')->getClientOriginalName();
        Storage::put('photo/'.$fileName, file_get_contents($request->file('photo')));
        endif;
        $member= Member::find($id);
        $member->name=$request->name;
        $member->address=$request->address;
        $member->age=$request->age;
        if ($fileName!='') {
            $member->photo=$fileName;
        }
        $member->save();
        return " Member: $request->name updated!!!";
    }
    public function store(StoreMember $request)
    {
        $fileName ='';
        if ($request->file('photo')) {
            $this->validate($request, [
                'photo' => 'mimes:jpeg,jpg,png,gif|max:10240',
            ]);
            $fileName = date('Y-m-d', time()).'-'.$request->file('photo')->getClientOriginalName();
            Storage::put('photo/'.$fileName, file_get_contents($request->file('photo')));
        }
        $member=new Member();
        $member->name=$request->name;
        $member->address=$request->address;
        $member->age=$request->age;
        if ($fileName!='') {
            $member->photo=$fileName;
        }
        $member->save();
        return response('Successfully', 200)
                  ->header('Content-Type', 'text/plain');
    }
    public function edit($id)
    {
        $member = Member::find($id);
        if ($member) {
            return response($member, 200)
                  ->header('Content-Type', 'text/plain');
        }
        return response($member, 201)
              ->header('Content-Type', 'text/plain');
    }
    public function delete($id)
    {
        $member = Member::find($id);
        if ($member) {
            $member->delete();
            return response('Successfully', 200)
                  ->header('Content-Type', 'text/plain');
        }
        return response('Error', 201)
              ->header('Content-Type', 'text/plain');
    }
}
