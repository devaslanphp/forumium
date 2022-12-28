<?php

namespace App\Core;

enum SocialConstants: string
{

    case FACEBOOK = "facebook";
    case GITHUB = "github";
    case GOOGLE = "google";
    case TWITTER = "twitter";

    case ENABLED_SOCIALS = "facebook,github,google";

    public static function color(string $name)
    {
        return match ($name) {
            self::FACEBOOK->value => '3b5998',
            self::GITHUB->value => '24292F',
            self::GOOGLE->value => 'DB4437',
            self::TWITTER->value => '00ACEE',
        };
    }

    public static function isEnabled(string $name)
    {
        $enabledSocials = explode(',', self::ENABLED_SOCIALS->value);
        return in_array($name, $enabledSocials);
    }

    public static function enabledCases()
    {
        $socials = [];
        foreach (array_column(self::cases(), 'value') as $social) {
            if (self::isEnabled($social)) {
                $socials[] = $social;
            }
        }
        return $socials;
    }

}
