<?php

namespace App\Models;

use App\Traits\CreatorAndUpdater;
use App\Traits\ExtendedModel;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Tag extends Model
{
    use HasFactory, CreatorAndUpdater, ExtendedModel, Searchable;

    protected $fillable = ['name'];
    protected $casts = [];
    protected $hidden = [];

    protected $primaryKey = 'name';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * Get posts of this model
     *
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    /**
     * Get first-tags of each matching name or create
     *
     */
    public static function firstOrCreateMany(array|Collection $tagNames): EloquentCollection
    {
        $tags = new EloquentCollection();
        foreach ($tagNames as $tagName) {
            $tags->push(static::firstOrCreate(['name' => $tagName]));
        }
        return $tags;
    }
}
