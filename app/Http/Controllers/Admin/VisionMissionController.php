<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mission;
use App\Models\Vision;
use Illuminate\Http\Request;

class VisionMissionController extends Controller
{
    public function index()
    {
        $vision = Vision::first();
        $missions = Mission::all();
        return view('admin.vision-mission.index', compact('vision', 'missions'));
    }

    public function update(Request $request, string $id)
    {
        if ($request->input('type') === 'vision') {
            $vision = Vision::find($id);
            if ($vision) {
                $request->validate(['content' => 'required|string']);
                $vision->update(['content' => $request->content]);
                return back()->with('success', 'Vision updated successfully.');
            }
        } elseif ($request->input('type') === 'mission') {
            $mission = Mission::find($id);
            if ($mission) {
                $request->validate(['content' => 'required|string']);
                $mission->update(['content' => $request->content]);
                return back()->with('success', 'Mission updated successfully.');
            }
        }

        return back()->with('error', 'Item not found or invalid type.');
    }

    public function store(Request $request)
    {
        // Store new Mission
        $request->validate(['content' => 'required|string']);
        Mission::create(['content' => $request->content]);
        return back()->with('success', 'Mission added successfully.');
    }

    public function destroy(string $id)
    {
        $mission = Mission::find($id);
        if ($mission) {
            $mission->delete();
            return back()->with('success', 'Mission deleted successfully.');
        }
        return back()->with('error', 'Mission not found.');
    }
}
