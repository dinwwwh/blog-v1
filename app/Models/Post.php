<?php

namespace App\Models;

use App\Traits\CreatorAndUpdater;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory, CreatorAndUpdater, Searchable;

    protected $fillable = ['title', 'description', 'content', 'representative_image_path'];
    protected $casts = [];
    protected $hidden = [];

    /**
     * Laravel-scout with meilisearch setup
     *
     */
    public $meilisearchFilterable = ['creator_id', 'updater_id', 'tags'];
    public function toSearchableArray(): array
    {
        $this->load('tags');
        return $this->toArray();
    }

    /**
     * Get tags of this model
     *
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
