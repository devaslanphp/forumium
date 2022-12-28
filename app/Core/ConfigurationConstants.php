<?php

namespace App\Core;

use App\Models\Configuration;

enum ConfigurationConstants
{

    public static function case(string $name): bool
    {
        return Configuration::where('name', $name)->first()?->is_enabled ?? false;
    }

}
