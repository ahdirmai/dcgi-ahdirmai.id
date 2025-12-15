<?php

namespace App\View\Components;

use App\Models\SiteContent;
use Illuminate\View\Component;
use Illuminate\View\View;

class Footer extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        $socials = SiteContent::where('section', 'social')->get()->keyBy('key');

        return view('components.footer', compact('socials'));
    }
}
