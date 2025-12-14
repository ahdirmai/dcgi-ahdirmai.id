<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteContentController extends Controller
{
    public function index()
    {
        $contents = SiteContent::all()->keyBy(function ($item) {
            return $item->section . '_' . $item->key;
        });

        // Get Sponsorships
        $sponsorships = SiteContent::where('section', 'sponsorship')->get();

        // Get Social Media
        $socials = SiteContent::where('section', 'social')->get()->keyBy('key');

        return view('admin.site-content.index', compact('contents', 'sponsorships', 'socials'));
    }

    public function storeSponsor(Request $request)
    {
        $request->validate([
            'sponsor_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('sponsor_image')) {
            $path = $request->file('sponsor_image')->store('uploads', 'public');
            
            SiteContent::create([
                'section' => 'sponsorship',
                'key' => 'sponsor_' . uniqid(),
                'content' => Storage::url($path),
                'type' => 'image',
            ]);
        }

        return redirect()->back()->with('success', 'Sponsor added successfully.');
    }

    public function destroySponsor($id)
    {
        $sponsor = SiteContent::findOrFail($id);
        
        // Optional: Delete file from storage
        // if (Storage::disk('public')->exists(str_replace('/storage/', '', $sponsor->content))) {
        //     Storage::disk('public')->delete(str_replace('/storage/', '', $sponsor->content));
        // }

        $sponsor->delete();

        return redirect()->back()->with('success', 'Sponsor deleted successfully.');
    }

    public function update(Request $request)
    {
        $section = $request->input('section');

        switch ($section) {
            case 'hero':
                $request->validate([
                    'hero_background_type' => 'required|in:image,video',
                    'hero_background_file' => 'nullable|file|mimes:jpeg,png,jpg,mp4,mov,avi|max:20480', // 20MB max
                ]);

                $this->updateContent('hero', 'background_type', $request->hero_background_type);

                if ($request->hasFile('hero_background_file')) {
                    $path = $request->file('hero_background_file')->store('uploads', 'public');
                    $this->updateContent('hero', 'background_url', Storage::url($path), $request->hero_background_type);
                }
                break;

            case 'about':
                $request->validate([
                    'about_image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
                ]);

                if ($request->hasFile('about_image_file')) {
                    $path = $request->file('about_image_file')->store('uploads', 'public');
                    $this->updateContent('about', 'image_url', Storage::url($path), 'image');
                }
                break;

            case 'social':
                if ($request->has('social')) {
                    foreach ($request->social as $key => $value) {
                        $this->updateContent('social', $key, $value);
                    }
                }
                break;
            
            default:
                return redirect()->back()->with('error', 'Invalid section.');
        }

        return redirect()->route('admin.site-content.index')->with('success', ucfirst($section) . ' content updated successfully.');
    }

    private function updateContent($section, $key, $content, $type = 'text')
    {
        SiteContent::updateOrCreate(
            ['section' => $section, 'key' => $key],
            ['content' => $content, 'type' => $type]
        );
    }
}
