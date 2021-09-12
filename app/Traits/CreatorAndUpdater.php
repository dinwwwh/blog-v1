<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait CreatorAndUpdater
{
    /**
     * Declare updater and creator to fields of model
     *
     */
    static public function bootCreatorAndUpdater(): void
    {
        static::creating(function ($model) {
            $model->creator_id = $model->creator_id || auth()->user()?->getKey();
        });

        static::updating(function ($model) {
            $model->updater_id = $model->updater_id || auth()->user()?->getKey();
        });
    }

    /**
     * Get Creator of the model
     *
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    /**
     * Get latest updater of the model
     *
     */
    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updater_id');
    }
}
