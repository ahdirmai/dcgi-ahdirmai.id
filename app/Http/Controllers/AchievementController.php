<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        $achievements = Achievement::with('galleries')->orderBy('year', 'desc')->get();

        $siteContent = \App\Models\SiteContent::all()->keyBy(function ($item) {
            return $item->section . '_' . $item->key;
        });

        return view('achievements', compact('achievements', 'siteContent'));
    }
}
