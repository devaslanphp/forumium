<?php

namespace App\Core;

enum FollowerConstants: string
{

    case NONE = "none";
    case FOLLOWING = "following";
    case NOT_FOLLOWING = "not-following";
    case IGNORING = "ignoring";

}
