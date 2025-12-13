<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::with('galleries')->latest()->get();
        return view('admin.achievements.index', compact('achievements'));
    }

    public function create()
    {
        return view('admin.achievements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'description' => 'nullable|string',
            'images.*' => 'image|max:2048', // Multiple images
        ]);

        $achievement = Achievement::create($request->only(['title', 'year', 'description']));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('achievements', 'public');
                $achievement->galleries()->create([
                    'image_path' => '/storage/' . $path,
                    'caption' => $achievement->title . ' Image'
                ]);
            }
        }

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement created successfully.');
    }

    public function edit(Achievement $achievement)
    {
        $achievement->load('galleries');
        return view('admin.achievements.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'description' => 'nullable|string',
            'images.*' => 'image|max:2048',
        ]);

        $achievement->update($request->only(['title', 'year', 'description']));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('achievements', 'public');
                $achievement->galleries()->create([
                    'image_path' => '/storage/' . $path,
                    'caption' => $achievement->title . ' Image'
                ]);
            }
        }

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement updated successfully.');
    }

    public function destroy(Achievement $achievement)
    {
        foreach ($achievement->galleries as $gallery) {
            $path = str_replace('/storage/', '', $gallery->image_path);
            Storage::disk('public')->delete($path);
            $gallery->delete();
        }
        $achievement->delete();
        return redirect()->route('admin.achievements.index')->with('success', 'Achievement deleted successfully.');
    }
}
