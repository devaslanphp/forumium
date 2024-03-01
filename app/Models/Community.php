<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable =[
        'feature_image',
        'name',
        'banner_youtube_urls',
        'banner_images',
        'long_description',
        'short_description',
        'links',
        'is_public',
        'is_paid',
        'monthly_payment',
    ];

    protected $casts =[
        'banner_youtube_urls'=>'array',
        'banner_images'=>'array',
        'links'=>'array',
    ];

    public function creator()
    {
       return $this->belongsTo(User::class, 'user_id');
    }
}
