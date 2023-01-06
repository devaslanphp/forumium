<?php

namespace App\Helpers;

use Devaslanphp\FilamentAvatar\Core\UiAvatarsProvider;
use Illuminate\Database\Eloquent\Model;

class CustomUserAvatar
{

    /**
     * Get the user avatar (picture) url from a user object
     *
     * @param Model $user
     * @return string
     */
    public function get(Model $user): string
    {
        $field = config('filament-avatar.providers.custom-avatar.name_field');
        if ($user->{$field}) {
            return asset('storage/' . $user->{$field});
        }
        return (new UiAvatarsProvider())->get($user);
    }

}
