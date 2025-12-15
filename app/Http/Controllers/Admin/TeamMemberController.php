<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index(Request $request)
    {
        $query = TeamMember::with('gallery')->latest();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('role', 'like', "%{$search}%");
            });
        }

        // Filter by Type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        
        // Filter by Section
        if ($request->filled('section')) {
            $query->where('section', $request->section);
        }

        $team = $query->paginate(10);
        $sections = TeamMember::select('section')->distinct()->whereNotNull('section')->pluck('section');

        return view('admin.team.index', compact('team', 'sections'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'section' => 'nullable|string|max:255',
            'type' => 'required|in:leadership,member',
            'image' => 'nullable|image|max:2048',
        ]);

        $teamMember = TeamMember::create($request->only(['name', 'role', 'section', 'type']));

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('team', 'public');
            $teamMember->gallery()->create([
                'image_path' => '/storage/' . $path,
                'caption' => $teamMember->name
            ]);
        }

        return redirect()->route('admin.team.index')->with('success', 'Team Member added successfully.');
    }

    public function edit($id)
    {
        $team = TeamMember::with('gallery')->findOrFail($id);
        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $teamMember = TeamMember::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'section' => 'nullable|string|max:255',
            'type' => 'required|in:leadership,member',
            'image' => 'nullable|image|max:2048',
        ]);

        $teamMember->update($request->only(['name', 'role', 'section', 'type']));

        if ($request->hasFile('image')) {
            // Delete old image
            if ($teamMember->gallery) {
                 $oldPath = str_replace('/storage/', '', $teamMember->gallery->image_path);
                 Storage::disk('public')->delete($oldPath);
                 $teamMember->gallery()->delete();
            }

            $path = $request->file('image')->store('team', 'public');
            $teamMember->gallery()->create([
                'image_path' => '/storage/' . $path,
                'caption' => $teamMember->name
            ]);
        }

        return redirect()->route('admin.team.index')->with('success', 'Team Member updated successfully.');
    }

    public function destroy($id)
    {
        $teamMember = TeamMember::findOrFail($id);
        if ($teamMember->gallery) {
             $path = str_replace('/storage/', '', $teamMember->gallery->image_path);
             Storage::disk('public')->delete($path);
             $teamMember->gallery()->delete();
        }
        $teamMember->delete();
        return redirect()->route('admin.team.index')->with('success', 'Team Member deleted successfully.');
    }

    public function import(Request $request) 
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        \Maatwebsite\Excel\Facades\Excel::import(new \App\Imports\TeamMembersImport, $request->file('file'));
        
        return redirect()->route('admin.team.index')->with('success', 'Team Members imported successfully.');
    }

    public function downloadTemplate()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\TeamMembersTemplateExport, 'team_members_template.xlsx');
    }

    public function toggleStar($id)
    {
        $member = TeamMember::findOrFail($id);
        
        // If we are turning it ON (it was false)
        if (!$member->star) {
            // Turn off all others
            TeamMember::where('star', true)->update(['star' => false]);
            $member->update(['star' => true]);
        } else {
            // Turning OFF
            $member->update(['star' => false]);
        }
        
        return response()->json(['success' => true, 'star' => $member->star]);
    }
}
