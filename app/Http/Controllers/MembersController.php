<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;

class MembersController extends Controller
{
    public function index()
    {
        // Leadership sorted by ID (assuming insertion order matters) or you could add a specific sort column
        $leadership = TeamMember::where('type', 'leadership')
            ->with('gallery')
            ->orderBy('id')
            ->get();

        // Reorder leadership to put the starred member in the 2nd position (index 1)
        if ($leadership->count() >= 3) {
            $starMember = $leadership->firstWhere('star', true);
            if ($starMember) {
                $others = $leadership->reject(function ($member) use ($starMember) {
                    return $member->is($starMember);
                });

                $targetIndex = 1;

                $newLeadership = $others->splice(0, $targetIndex);
                $newLeadership->push($starMember);
                $newLeadership = $newLeadership->merge($others);

                $leadership = $newLeadership;
            }
        }

        $members = TeamMember::where('type', 'member')
            ->with('gallery')
            ->orderBy('name')
            ->get();

        // return $leadership;

        return view('members', compact('leadership', 'members'));
    }
}
