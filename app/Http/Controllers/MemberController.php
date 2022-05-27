<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMemberRequest;
use App\Models\Member;
use CreateMembersTable;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function createMember(CreateMemberRequest $request)
    {
        $data = $request->validated();
        $member = Member::create($data);

        return response()->json(['data' => $member]);
    }

    public function getMemberById(Member $member)
    {
        $member = Member::whereId($member->id)->first();

        return response()->json(['data' => $member]);
    }

    public function deleteMember(Member $member)
    {
        $member->delete();
    }

    public function updateMember(CreateMemberRequest $request, Member $member)
    {
        $member = Member::whereId($member->id)->first();

        $member->update([
            'name' => $request->get('name'),
            'telephone' => $request->get('telephone'),
            'address' => $request->get('address'),
            'email' => $request->get('email'),
            'whatsapp_number' => $request->get('whatsapp_number'),
        ]);
    }
}
