<?php

namespace App\Traits;

trait Sluggable
{
    public function getRouteKeyName()
    {
        return "slug";
    }
}
