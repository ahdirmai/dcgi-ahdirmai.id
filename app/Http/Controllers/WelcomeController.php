<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Album;
use App\Models\Mission;
use App\Models\SiteContent;
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

        // Reorder leadership to put the starred member in the middle
        if ($leadership->count() >= 3) {
            $starMember = $leadership->firstWhere('star', true);
            if ($starMember) {
                $others = $leadership->reject(function ($member) use ($starMember) {
                    return $member->is($starMember);
                });

                // Calculate the middle index for the new collection (others + star member)
                // The new collection will have the same count as the original.
                // User requested star always at position 2 (index 1)
                $targetIndex = 1;

                $newLeadership = $others->splice(0, $targetIndex);
                $newLeadership->push($starMember);
                $newLeadership = $newLeadership->merge($others);

                $leadership = $newLeadership;
            }
        }

        $structuredData = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'DC Genderang Irama',
            'alternateName' => 'DCGI',
            'url' => url('/'),
            'logo' => asset('favicon.ico'),
            'sameAs' => [
                'https://www.instagram.com/dcgenderangirama',
                'https://www.facebook.com/dcgenderangirama',
                'https://www.youtube.com/@dcgenderangirama',
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'email' => 'join@genderangirama.id',
                'contactType' => 'customer service',
            ],
        ];

        $siteContent = SiteContent::all()->keyBy(function ($item) {
            return $item->section.'_'.$item->key;
        });

        $sponsorships = SiteContent::where('section', 'sponsorship')->get();
        $socials = SiteContent::where('section', 'social')->get()->keyBy('key');

        // Update Structured Data with dynamic social links
        $structuredData['sameAs'] = [
            $socials['instagram']->content ?? 'https://www.instagram.com/dcgenderangirama',
            'https://www.facebook.com/dcgenderangirama', // Facebook not in requirements, keeping static or ignore? User didn't ask for FB.
            $socials['youtube']->content ?? 'https://www.youtube.com/@dcgenderangirama',
            $socials['tiktok']->content ?? '', // Add TikTok if available
        ];
        // Filter out empty
        $structuredData['sameAs'] = array_filter($structuredData['sameAs']);

        $structuredData['contactPoint']['email'] = $socials['email']->content ?? 'join@genderangirama.id';

        return view('welcome', compact('vision', 'missions', 'albums', 'achievements', 'leadership', 'structuredData', 'siteContent', 'sponsorships', 'socials'));

    }
}
