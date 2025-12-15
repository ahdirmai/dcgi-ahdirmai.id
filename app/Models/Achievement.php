<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'year', 'description', 'long_description', 'featured'];

    public function galleries()
    {
        return $this->morphMany(Gallery::class, 'galleryable');
    }
}
