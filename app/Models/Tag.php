<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'color', 'icon', 'description'
    ];

    public function discussions(): BelongsToMany
    {
        return $this->belongsToMany(Discussion::class, 'discussion_tags', 'tag_id', 'discussion_id');
    }
}
