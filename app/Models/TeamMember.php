<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'role', 'section', 'type', 'star'];

    protected $casts = [
        'star' => 'boolean',
    ];

    public function gallery()
    {
        return $this->morphOne(Gallery::class, 'galleryable');
    }
    
    // Fallback if we need multiple images later, or just access check.
    public function galleries()
    {
        return $this->morphMany(Gallery::class, 'galleryable');
    }
}
