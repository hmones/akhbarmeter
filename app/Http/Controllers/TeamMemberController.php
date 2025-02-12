<?php

namespace App\Http\Controllers;

use App\Http\Resources\TeamMemberResource;
use App\Models\TeamMember;
use Illuminate\View\View;

class TeamMemberController extends Controller
{
    public function index(): View
    {
        $teamMembers = TeamMemberResource::collection(TeamMember::where('active', true)->get())->toArray(request());

        return view('pages.team-member', compact('teamMembers'));
    }
}
