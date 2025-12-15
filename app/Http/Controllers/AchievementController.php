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

        return view('achievements', compact('achievements'));
    }
}
