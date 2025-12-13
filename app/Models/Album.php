<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'cover_image_path'];

    public function galleries()
    {
        return $this->morphMany(Gallery::class, 'galleryable');
    }
}
