<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Album;
use App\Models\Mission;
use App\Models\TeamMember;
use App\Models\Vision;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $vision = Vision::first();
        $missions = Mission::all();
        // Get 4 latest albums for the grid
        $albums = Album::latest()->take(4)->get(); 
        
        $achievements = Achievement::with('galleries')->orderBy('year', 'asc')->get();
        // Group achievements by year if needed, or just pass them. Frontend loop iterates them.
        
        $leadership = TeamMember::with('gallery')->where('type', 'leadership')->get();
        
        return view('welcome', compact('vision', 'missions', 'albums', 'achievements', 'leadership'));
    }
}
