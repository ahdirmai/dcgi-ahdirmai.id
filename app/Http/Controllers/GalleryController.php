<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $albums = \App\Models\Album::with('galleries')->latest()->get();

        $siteContent = \App\Models\SiteContent::all()->keyBy(function ($item) {
            return $item->section . '_' . $item->key;
        });

        return view('gallery', compact('albums', 'siteContent'));
    }
}
