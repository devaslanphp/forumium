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
        'name',
        'description',
        'is_public',
        'is_paid',
        'monthly_payment',
    ];

    public function creator()
    {
       return $this->belongsTo(User::class, 'user_id');
    }
}
