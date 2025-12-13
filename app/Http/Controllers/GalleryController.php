<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $albums = \App\Models\Album::with('galleries')->latest()->get();
        return view('gallery', compact('albums'));
    }
}
