<?php

namespace App\Core;

enum SocialConstants: string
{

    case FACEBOOK = "facebook";
    case GITHUB = "github";
    case GOOGLE = "google";

    public static function color(string $name)
    {
        return match ($name) {
            self::FACEBOOK->value => '3b5998',
            self::GITHUB->value => '24292F',
            self::GOOGLE->value => 'DB4437'
        };
    }

}
