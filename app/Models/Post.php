<?php

namespace App\Models;

use App\Traits\CreatorAndUpdater;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory, CreatorAndUpdater;

    protected $fillable = ['title', 'content', 'representative_image_path'];
    protected $casts = [];
    protected $hidden = [];

    /**
     * Get tags of this model
     *
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
