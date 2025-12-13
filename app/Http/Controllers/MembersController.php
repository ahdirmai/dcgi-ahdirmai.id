<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function index()
    {
        $leadership = \App\Models\TeamMember::where('type', 'leadership')->with('gallery')->get();
        $members = \App\Models\TeamMember::where('type', 'member')->with('gallery')->orderBy('name')->get();
        
        return view('members', compact('leadership', 'members'));
    }
}
