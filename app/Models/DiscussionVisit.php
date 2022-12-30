<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DiscussionVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'discussion_id', 'meta'
    ];

    protected $casts = [
        'meta' => 'object'
    ];

    public static function boot()
    {
        parent::boot();

        static::created(function (DiscussionVisit $item) {
            $item->discussion->updateVisits();
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function discussion(): BelongsTo
    {
        return $this->belongsTo(Discussion::class, 'discussion_id', 'id');
    }
}
