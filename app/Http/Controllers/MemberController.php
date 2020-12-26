<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;

use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function create()
    {
        return view('member.add');
    }
    public function index()
    {
        $members = Member::orderBy('id', 'asc')->paginate(5);
        return view('member.index', compact('members'));
    }
    public function store(MemberRequest $request)
    {
        $member = new Member;
        $member->name = $request['name'];
        $member->phone = $request['phone'];
        $member->email = $request['email'];
        $member->address = $request['address'];
        $member->sex = $request['sex'];
        $member->birthday = date('Y-m-d', strtotime($request['birthday']));
        $member->description = $request['description'];
        $member->content = $request['content'];
        $member->save();
        //Member::create($request->toArray());
        return redirect()->route('members.index')
            ->with(['status' => 'success', 'message' => 'Created member successfully!']);
    }
    public function edit($id){
        $member = Member::findOrFail($id);
        return view('member.edit', compact('member'));
    }
    public function update(Request $request, $id){
        $member = Member::findOrFail($id);
        $member->name = $request['name'];
        $member->phone = $request['phone'];
        $member->email = $request['email'];
        $member->address = $request['address'];
        $member->sex = $request['sex'];
        $member->birthday = date('Y-m-d', strtotime($request['birthday']));
        $member->description = $request['description'];
        $member->content = $request['content'];
        $member->save();
        return redirect()->route('members.index')
            ->with(['status' => 'success', 'message' => 'Updated member successfully!']);
    }
    public function delete($id) {
        Member::findOrFail($id);
        Member::destroy($id);
        return redirect()->route('members.index')
            ->with(['status' => 'success', 'message' => 'Deleted member successfully!']);
    }
}
