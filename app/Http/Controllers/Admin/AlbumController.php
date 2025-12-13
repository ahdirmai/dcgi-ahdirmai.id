<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::latest()->get();
        return view('admin.albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.albums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|max:2048', // 2MB Max
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('albums', 'public');
            $data['cover_image_path'] = '/storage/' . $path;
        }

        Album::create($data);

        return redirect()->route('admin.albums.index')->with('success', 'Album created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('admin.albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('cover_image')) {
            // Delete old image if exists
            if ($album->cover_image_path) {
                // Remove '/storage/' prefix to get path relative to public disk
                $oldPath = str_replace('/storage/', '', $album->cover_image_path);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('cover_image')->store('albums', 'public');
            $data['cover_image_path'] = '/storage/' . $path;
        }

        $album->update($data);

        return redirect()->route('admin.albums.index')->with('success', 'Album updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        if ($album->cover_image_path) {
             $oldPath = str_replace('/storage/', '', $album->cover_image_path);
             Storage::disk('public')->delete($oldPath);
        }
        $album->delete();
        return redirect()->route('admin.albums.index')->with('success', 'Album deleted successfully.');
    }
}
